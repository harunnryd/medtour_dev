<?php

namespace App\Http\ViewComposers;

use App\Supports\TreatmentService;
use Illuminate\View\View;

class TreatmentComposer
{
    protected $service;

    public function __construct(TreatmentService $service)
    {
        $this->service = $service;
    }

    public function compose(View $view)
    {
        $view->with('treatments', $this->service);
    }
}
