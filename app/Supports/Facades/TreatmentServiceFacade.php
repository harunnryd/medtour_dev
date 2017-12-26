<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class TreatmentServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TreatmentService';
    }
}
