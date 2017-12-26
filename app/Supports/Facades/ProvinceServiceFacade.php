<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class ProvinceServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProvinceService';
    }
}