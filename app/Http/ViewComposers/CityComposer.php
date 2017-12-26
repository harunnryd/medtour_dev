<?php

namespace App\Http\ViewComposers;

use App\Supports\CityService;
use Illuminate\View\View;

class CityComposer {

    protected $service;

    public function __construct(CityService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('city', $this->service);
    }
}