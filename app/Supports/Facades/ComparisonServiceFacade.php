<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class ComparisonServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ComparisonService';
    }
}
