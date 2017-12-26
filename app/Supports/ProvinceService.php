<?php

namespace App\Supports;

use App\Repositories\ProvinceRepository;
use App\Http\Requests\ProvinceRequest;

class ProvinceService {

    private $province;

    public function __construct(ProvinceRepository $province)
    {
        $this->province = $province;
    }

    public function provinceRepository()
    {
        return $this->province;
    }

    public function pluck($field, $id = 'slug') {
        return $this->provinceRepository()
                    ->makeModel()
                    ->pluck($field, $id);
    }
}