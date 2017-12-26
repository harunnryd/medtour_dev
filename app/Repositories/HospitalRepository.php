<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class HospitalRepository extends Repository {

    public function model() {
        return 'App\Models\Hospital';
    }
}