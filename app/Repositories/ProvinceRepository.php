<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class ProvinceRepository extends Repository {

    public function model() {
        return 'App\Models\Province';
    }
}