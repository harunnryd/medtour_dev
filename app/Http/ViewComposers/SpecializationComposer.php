<?php

namespace App\Http\ViewComposers;

use App\Supports\SpecializationService;
use Illuminate\View\View;

class SpecializationComposer
{

    protected $service;

    public function __construct(SpecializationService $service)
    {
        $this->service = $service;
    }

    public function compose(View $view)
    {
        $view->with('specializations', $this->service);
    }
}
