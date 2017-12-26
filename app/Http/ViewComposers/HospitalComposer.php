<?php

namespace App\Http\ViewComposers;

use App\Supports\HospitalService;
use Illuminate\View\View;

class HospitalComposer {

    protected $service;

    public function __construct(HospitalService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('hospitals', $this->service);
    }
}