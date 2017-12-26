<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class DoctorServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'DoctorService';
    }
}
