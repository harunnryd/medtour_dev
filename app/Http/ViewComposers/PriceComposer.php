<?php

namespace App\Http\ViewComposers;

use App\Supports\PriceService;
use Illuminate\View\View;

class PriceComposer {

    protected $service;

    public function __construct(PriceService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('pricing', $this->service);
    }
}