<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Models\Price;
use App\Models\Doctor;
use PriceService;
use View;
use DB;

class PriceController extends Controller
{
    public function index()
    {
    }

    public function create(Doctor $doctor)
    {
        return View::make('prices.create')->with('doctor', $doctor);
    }

    public function store(PriceRequest $request)
    {
        PriceService::create($request);

        return redirect()->to('admin?menu=doctor');
    }
}
