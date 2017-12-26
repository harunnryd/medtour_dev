<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class FacilityRepository extends Repository {

    public function model() {
        return 'App\Models\Facility';
    }
}