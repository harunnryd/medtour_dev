<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $menu = request('menu');
        return View::make('admin')->with('menu', $menu);
    }
}
