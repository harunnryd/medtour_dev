<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class RoleServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RoleService';
    }
}
