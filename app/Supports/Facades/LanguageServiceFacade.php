<?php

namespace App\Supports\Facades;

use Illuminate\Support\Facades\Facade;

class LanguageServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LanguageService';
    }
}
