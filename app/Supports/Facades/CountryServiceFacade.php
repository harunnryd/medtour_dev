<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class CountryServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CountryService';
    }
}
