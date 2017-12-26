<?php

namespace App\Supports;

use Illuminate\Support\Collection as Collect;
use App\Repositories\CountryRepository;
use Illuminate\Database\QueryException;
use App\Http\Requests\CountryRequest;
use App\Supports\Traits\UploadPhoto;
use Illuminate\Support\Arr;

class CountryService
{
    use UploadPhoto;

    private $country;

    public function __construct(CountryRepository $country)
    {
        $this->country = $country;
    }

    public function countryRepository()
    {
        return $this->country;
    }

    public function create(CountryRequest $data)
    {
        try {
            $dataForm = $data->all();

            if ($data->hasFile('photo')) {
                $data['photo'] = $this->storeImage($data->file('photo'));
            }
            $country = $this->country->create($dataForm);

            return Response::json($country, 201);
        } catch (QueryException $e) {
            return Response::json(['error' => $e->getMessage()], 403);
        }
    }

    public function update(CountryRequest $data, $model)
    {
        try {
            $dataForm = $data->all();

            $country = $this->country->find($model->id);

            if ($data->hasFile('photo')) {
                if ($country->photo !== '') {
                    // hapus foto dulu
                    $this->destroyImage($entity->photo);
                    // baru simpan foto yang baru
                    $dataForm['photo'] = $this->storeImage($data->file('photo'));
                }
            }

            $country->update($dataForm);
        } catch (QueryException $e) {
            return App::abort(403);
        }
    }

    public function random()
    {
        $countries = Collect::make($this->country->all())->random(4);
        $response = [];

        foreach ($countries as $key => $val) {
            array_push($response, [
                'name' => $val->name,
                'links' => $val->slug
            ]);
        }

        return $response;
    }

    public function pluck($field, $id = 'slug')
    {
        return $this->countryRepository()
                    ->makeModel()
                    ->pluck($field, $id);
    }

    //load Country & Hospital per id
    public function loadHospital($id)
    {
        $data = [];
        $collect = collect($this->countryRepository()
                                ->find($id)
                                ->load('provinces.cities.entities.hospital'));

        foreach ($collect['provinces'] as $province) {
            foreach ($province['cities'] as $city) {
                foreach ($city['entities'] as $entity) {
                    if ($entity['hospital'] !== null) {
                        array_push($data, [
                            'photo'         => $entity['photo'],
                            'hospital_slug' => $entity['hospital']['slug'],
                            'name'          => $entity['hospital']['name'],
                            'province'      => $province,
                            'city'          => $city,
                            'country'       => $collect['name'],
                        ]);
                    }
                }
            }
        }
        return (new Collection($data))->paginate(10);
    }
}
