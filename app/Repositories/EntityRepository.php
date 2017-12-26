<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class EntityRepository extends Repository {

    public function model() {
        return 'App\Models\Entity';
    }
}