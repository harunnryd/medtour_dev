<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class DoctorRepository extends Repository {

    public function model() {
        return 'App\Models\Doctor';
    }
}