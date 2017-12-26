<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class CertificationRepository extends Repository {

    public function model() {
        return 'App\Models\Certification';
    }
}