<?php

namespace App\Supports;

use App\Repositories\CityRepository;
use App\Http\Requests\CityRequest;

class CityService {

    private $city;

    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    public function cityRepository()
    {
        return $this->city;
    }

    public function pluck($field, $id = 'slug')
    {
        return $this->cityRepository()->makeModel()->pluck($field, $id);
    }

    //load Country & Hospital per id
    public function loadHospital($id) {
        $data = [];
        $collect = collect($this->cityRepository()
                                ->find($id)
                                ->load('entities.hospital', 'province.country'));

        foreach ($collect['entities'] as $entity) {
                if ($entity['hospital'] !== null) {
                    array_push($data, [
                        'photo'         => $entity['photo'],
                        'hospital_slug' => $entity['hospital']['slug'],
                        'name'          => $entity['hospital']['name'],
                        'city'          => $collect['name'],
                        'province'      => $collect['province'],
                        'country'       => $collect['province']['country'],
                    ]);
                }

        }
        return (new Collection($data))->paginate(10);
    }
}