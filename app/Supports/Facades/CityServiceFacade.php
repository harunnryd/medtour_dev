<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class CityServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CityService';
    }
}