<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class PriceServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PriceService';
    }
}
