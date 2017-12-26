<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class EntityServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'EntityService';
    }
}
