<?php

namespace App\Supports;

use App\Repositories\SpecializationRepository;
use Illuminate\Support\Collection as Collect;
use App\Http\Requests\SpecializationRequest;

class SpecializationService {

    private $specialization;

    public function __construct(SpecializationRepository $specialization)
    {
        $this->specialization = $specialization;
    }

    public function specializationRepository()
    {
        return $this->specialization;
    }

    public function pluck($field, $id = 'slug')
    {
        return $this->specializationRepository()
                    ->makeModel()
                    ->pluck($field, $id);
    }

    public function load()
    {
        $all  = $this->specializationRepository()
                     ->all();

        // buat koleksi
        $data = Collect::make();

        foreach ($all as $specialization) {
            $data->push([
                    'id'   => $specialization['id'],
                    'slug' => $specialization['slug'],
                    'type' => $specialization['type'],
            ]);
        }

        return (new Collection($data))->paginate(10)
                                      ->appends(['menu' => request('menu')]);
    }
}
