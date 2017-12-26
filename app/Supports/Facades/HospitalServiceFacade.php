<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class HospitalServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'HospitalService';
    }
}
