<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ComparisonService;
use View;

class ComparisonController extends Controller
{

    public function index()
    {
        return View::make('comparisons.index');
    }

    // public function delete($id)
    // {
    //
    // }
}
