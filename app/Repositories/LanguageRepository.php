<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class LanguageRepository extends Repository {

    public function model() {
        return 'App\Models\Language';
    }
}