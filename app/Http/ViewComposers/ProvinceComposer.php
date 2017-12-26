<?php

namespace App\Http\ViewComposers;

use App\Supports\ProvinceService;
use Illuminate\View\View;

class ProvinceComposer {

    protected $service;

    public function __construct(ProvinceService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('province', $this->service);
    }
}