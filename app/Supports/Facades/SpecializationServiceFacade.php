<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class SpecializationServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SpecializationService';
    }
}
