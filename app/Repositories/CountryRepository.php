<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class CountryRepository extends Repository {

    public function model() {
        return 'App\Models\Country';
    }
}