<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class TreatmentRepository extends Repository {

    public function model() {
        return 'App\Models\Treatment';
    }

}