<?php

namespace App\Http\ViewComposers;

use App\Supports\RoleService;
use Illuminate\View\View;

class RoleComposer {

    protected $service;

    public function __construct(RoleService $service) {
        $this->service = $service;
    }

    public function compose(View $view) {
        $view->with('roles', $this->service);
    }

}