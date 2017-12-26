<?php

namespace App\Supports;

use Illuminate\Support\Arr;
use App\Repositories\DoctorRepository;
use App\Http\Requests\TreatmentRequest;
use App\Repositories\TreatmentRepository;
use Illuminate\Support\Collection as Collect;
use App\Repositories\SpecializationRepository;

class TreatmentService
{

    private $treatment, $doctor;

    public function __construct(TreatmentRepository $treatment, DoctorRepository $doctor)
    {
        $this->treatment = $treatment;
        $this->doctor = $doctor;
    }

    public function treatmentRepository()
    {
        return $this->treatment;
    }

    // public function specializationRepository()
    // {
    //     return $this->specialization;
    // }

    public function doctorRepository()
    {
        return $this->doctor;
    }

    public function create(TreatmentRequest $request)
    {
        // buat array kosong
        // $treatment_id = [];

        // simpan treatmen baru
        $this->treatmentRepository()->create($request->all());

        // // sync otomatis treatment dgn semua dokter karena dokter sudah punya specialization
        // if (!empty($this->doctorRepository()->all()))
        // {
        //     //
        //     foreach ($this->doctorRepository()->all() as $doctor)
        //     {
        //         //cek specialization doctor
        //         if (!empty($doctor->specializations))
        //         {
        //             //push id ke dalam array
        //             foreach ($doctor->specializations as $specialization)
        //             {
        //                 foreach ($specialization->treatments as $treatment)
        //                 {
        //                     $treatment_id = Arr::prepend($treatment_id, $treatment['id']);
        //                 }
        //             }

        //         }
        //     }
        //     // sync
        //     $doctor->entity->treatments()->sync($treatment_id);
        // }
    }

    public function pluck($field, $id = 'slug')
    {
        return $this->TreatmentRepository()
                    ->makeModel()
                    ->pluck($field, $id);
    }

    public function load()
    {
        $all  = $this->TreatmentRepository()
                     ->all();

        //buat koleksi
        $data = Collect::make();

        foreach ($all as $treatment) {
            $data->push([
                    'id'                  => $treatment['id'],
                    'slug'                => $treatment['slug'],
                    // 'specialization_type' => $treatment['specialization'],
                    'name'                => $treatment['name'],
                    'created_at'          => $treatment->created_at->diffForHumans(),
                    'updated_at'          => $treatment->updated_at->diffForHumans(),
            ]);
        }

        return (new Collection($data))->paginate(10)
                                      ->appends(['menu' => request('menu')]);
    }
}
