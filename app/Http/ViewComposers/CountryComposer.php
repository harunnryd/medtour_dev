<?php

namespace App\Http\ViewComposers;

use App\Supports\CountryService;
use Illuminate\View\View;

class CountryComposer {

    protected $service;

    public function __construct(CountryService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('country', $this->service);
    }
}