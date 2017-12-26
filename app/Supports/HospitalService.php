<?php

namespace App\Supports;

use Illuminate\Support\Collection as Collect;
use App\Repositories\HospitalRepository;
use Illuminate\Database\QueryException;
use App\Repositories\EntityRepository;
use App\Http\Requests\HospitalRequest;
use App\Supports\Traits\UploadPhoto;
use App;

class HospitalService
{

    use UploadPhoto;

    private $entity, $hospital;

    public function __construct(HospitalRepository $hospital, EntityRepository $entity)
    {
        $this->hospital = $hospital;
        $this->entity = $entity;
    }

    public function entityRepository()
    {
        return $this->entity;
    }

    public function hospitalRepository()
    {
        return $this->hospital;
    }

    // ambil data dari request form
    public function createHospitalAndEntity(HospitalRequest $data)
    {
        try {
            $entity   = $this->entityRepository();
            $dataForm = $data->all(); // ambil semua dari form

            if ($data->hasFile('photo')) {
                $dataForm['photo'] = $this->storeImage($data->file('photo'));
            }

            $entity = $entity->create($dataForm); // simpan ke table entity
            $doctor = $entity->hospital()
                             ->create($dataForm); // simpan ke table doctor
        } catch (QueryException $e) {
            return App::abort(403);
        }
    }

    public function updateHospitalAndEntity(HospitalRequest $data, $model)
    {
        try {
            $dataForm = $data->all();
            $entity   = $this->entityRepository()
                             ->find($model->entity->id);

            if ($data->hasFile('photo')) {
                if ($entity->photo !== '') {
                    $this->destroyImage($entity->photo);
                    $dataForm['photo'] = $this->storeImage($data->file('photo'));
                }
            }

            $entity->update($dataForm);
            $entity->hospital
                   ->update($data->only(
                       'name',
                       'beds',
                       'inpatients',
                       'outpatients'));
        } catch (QueryException $e) {
            return App::abort(403);
        }
    }

    public function load()
    {
        $all = $this->hospitalRepository()
                    ->all()
                    ->load('facilities');

        $data = Collect::make();

        foreach ($all as $hospital) {
            $data->push([
                    'id'          => $hospital['id'],
                    'slug'        => $hospital['slug'],
                    'name'        => $hospital['name'],
                    'beds'        => $hospital['beds'],
                    'inpatients'  => $hospital['inpatients'],
                    'outpatients' => $hospital['outpatients'],
                    'facilities'  => Collect::make($hospital['facilities']),
            ]);
        }
        return (new Collection($data))
                ->paginate(10)
                ->appends(['menu' => request('menu')]);
    }
}
