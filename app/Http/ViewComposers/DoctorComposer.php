<?php

namespace App\Http\ViewComposers;

use App\Supports\DoctorService;
use Illuminate\View\View;

class DoctorComposer {

    protected $service;

    public function __construct(DoctorService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('doctors', $this->service);
    }
}