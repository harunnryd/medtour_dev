<?php

namespace App\Supports;

use Illuminate\Support\Collection as Collect;
use Illuminate\Database\QueryException;
use App\Repositories\EntityRepository;
use App\Repositories\DoctorRepository;
use App\Http\Requests\DoctorRequest;
use App\Supports\Traits\UploadPhoto;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Carbon\Carbon;
use Response;
use Redirect;
use Alert;
use View;
use App;

class DoctorService
{
    use UploadPhoto;

    private $entity;
    private $doctor;

    public function __construct(DoctorRepository $doctor, EntityRepository $entity)
    {
        $this->entity = $entity;
        $this->doctor = $doctor;
    }

    public function doctorRepository()
    {
        return $this->doctor;
    }

    public function entityRepository()
    {
        return $this->entity;
    }

    public function viewEntity(Doctor $doctor)
    {
        if (Checker::noDoctorEntity($doctor)) {
            return View::make('doctors._add-entity')->with('doctor', $doctor);
        }
        return Redirect::back();
    }

    public function viewDoctor(Doctor $doctor)
    {
        if (!Checker::noDoctorEntity($doctor)) {
            return View::make('doctors.edit')->with('doctor', $doctor);
        }
        return Redirect::back();
    }

    public function createDoctor(DoctorRequest $data)
    {
        try {
            $dataDoctor = $data->only(['name', 'gender', 'experience']);
            $dataEntity = $data->only(['address', 'photo', 'contact', 'city_id']);

            if ($data->hasFile('photo')) {
                $dataEntity['photo'] = $this->storeImage($data->file('photo'));
            }

            $entity = $this->entityRepository()
                               ->create($dataEntity);

            $doctor = $entity->doctor()->create($dataDoctor);

            if ($data->has('languages')) {
                $doctor->languages()
                       ->attach($data->get('languages')); // simpan relasi languages
            }

            if ($data->has('specializations')) {
                $doctor->specializations()
                       ->attach($data->get('specializations')); // simpan relasi specializations
            }

            return Response::json($doctor, 201);
        } catch (QueryException $e) {
            return Response::json(['error' => $e->getMessage()], 403);
        }
    }

    // ambil data dari request form
    // public function createDoctorAndEntity(DoctorRequest $data) {
    //     try {
    //         $dataForm = $data->all(); // ambil semua dari form
    //         // periksa photo
    //         if ($data->hasFile('photo'))
    //         {
    //             $dataForm['photo'] = $this->storeImage($data->file('photo'));
    //         }
    //
    //         $entity = $this->entityRepository()
    //                        ->create($dataForm); // simpan ke table entity
    //
    //         // $doctor = $entity->doctor()
    //         //                  ->create($dataForm); // simpan ke table doctor
    //
    //         $doctor = $this->doctor->find($data->id);
    //         $doctor->update(['entity_id' => $entity->id]);
    //
    //         if ($data->has('languages'))
    //         {
    //             $doctor->languages()
    //                    ->attach($data->get('languages')); // simpan relasi languages
    //         }
    //
    //         if ($data->has('specializations'))
    //         {
    //             $doctor->specializations()
    //                    ->attach($data->get('specializations')); // simpan relasi specializations
    //         }
    //
    //     } catch (QueryException $e) {
    //         return App::abort(403);
    //     }
    // }

    public function updateDoctorAndEntity(DoctorRequest $data, $model)
    {
        try {
            // ambil semua request
            $dataForm = $data->all();

            // cari model
            $entity = $this->entityRepository()
                           ->find($model->entity->id);

            // $entity = $this->entityRepository()
            //                ->create($dataForm);

            if ($data->hasFile('photo')) {
                if ($entity->photo !== '') {
                    // hapus foto dulu
                    $this->destroyImage($entity->photo);
                    // baru simpan foto yang baru
                    $dataForm['photo'] = $this->storeImage($data->file('photo'));
                }
            }

            $entity->update($dataForm);

            $entity->doctor
                   ->update($data->only('name', 'gender', 'experience'));

            $entity->doctor
                   ->specializations()
                   ->sync($data->get('specializations'));

            $entity->doctor
                   ->languages()
                   ->sync($data->get('languages'));
        } catch (QueryException $e) {
            return App::abort(403);
        }
    }

    public function load()
    {
        $all  = $this->doctorRepository()
                     ->all()
                     ->load('specializations');

        $data = Collect::make();

        foreach ($all as $doctor) {
            $data->push([
                    'id'              => $doctor['id'],
                    'slug'            => $doctor['slug'],
                    'name'            => $doctor['name'],
                    'gender'          => $doctor['gender'],
                    'entity_id'       => $doctor['entity_id'],
                    'ratings'         => $doctor['ratings'],
                    'specializations' => Collect::make($doctor['specializations']),
                    'experience'      => Carbon::parse($doctor['experience'])->diff(Carbon::now())->format('%y Years %m Month'),
            ]);
        }

        return (new Collection($data))->paginate(10)
                                      ->appends(['menu' => request('menu')]);
    }

    public function addDoctorToCookie(Request $request)
    {
        $doctor = $this->doctorRepository()
                       ->findBy('slug', $request->doctor_slug);

        $comparison = Collect::make($request->cookie('comparison', []));

        $url = App::make('url')->previous(); // UrlGenerator

        $queryBuild = http_build_query([
                'specialization' => request('specialization'),
                'country'        => request('country'),
                'province'       => request('province'),
                'city'           => request('city'),
                'view'           => request('view')
            ]);

        foreach ($comparison as $compare) {
            if ($compare == $doctor->id) {
                Alert::info("Please select different doctor..", 'Oops :(')->persistent('Close');
            }
        }

        $comparison->push($doctor->id);

        return Redirect::to($url. $queryBuild) // to($url. '?'. $queryBuild)
                         ->withCookie(cookie()->forever('comparison', Collect::make($comparison)->unique())); // unique : memastikan kembali tidak ada doctor yang sama
    }

    public function removeDoctorFromCookie(Request $request, $id)
    {
        $comparison = Collect::make($request->cookie('comparison', []));
        // periksa
        if (($key = $comparison->search($id)) !== false) {
            $comparison->pull($key);
            return Redirect::to('comparison')->withCookie(cookie()->forever('comparison', $comparison));
        }
        return Redirect::to('comparison');
    }

    public function setPriceForTreatments(Request $request, $model)
    {
        //
    }
}
