<?php

namespace App\Http\ViewComposers;

use App\Supports\LanguageService;
use Illuminate\View\View;

class LanguageComposer {

    protected $service;

    public function __construct(LanguageService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('languages', $this->service);
    }
}