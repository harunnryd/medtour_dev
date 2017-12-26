<?php

namespace App\Http\ViewComposers;

use App\Supports\ComparisonService;
use Illuminate\View\View;

class ComparisonComposer {

    protected $service;

    public function __construct(ComparisonService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('comparisons', $this->service);
    }
}