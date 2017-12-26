<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class CityRepository extends Repository {

    public function model() {
        return 'App\Models\City';
    }
}