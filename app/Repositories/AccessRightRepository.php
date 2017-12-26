<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class AccessRightRepository extends Repository {

    public function model() {
        return 'App\Models\AccessRight';
    }
}