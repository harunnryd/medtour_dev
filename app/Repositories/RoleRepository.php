<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class RoleRepository extends Repository {

    public function model() {
        return 'App\Models\Role';
    }
}