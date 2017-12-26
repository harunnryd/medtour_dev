<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class SpecializationRepository extends Repository {

    public function model() {
        return 'App\Models\Specialization';
    }

}