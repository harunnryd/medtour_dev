<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest as Request;
use App\Models\City;
use CityService;
use Redirect;
use View;

class CityController extends Controller
{
    public function index()
    {
        return View::make('cities.index');
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        CityService::cityRepository()->create($request->all());
        return Redirect::back();
    }

    public function show(City $city)
    {
        $city = CityService::loadHospital($city->id);

        return View::make('cities.show', compact('city'));
    }


    public function edit(City $city)
    {
        //
    }

    public function update(Request $request, City $city)
    {
        CityService::cityRepository()->update($request->only('province_id', 'name'), $city->id);

        return Redirect::back();
    }

    public function destroy(City $city)
    {
        //
    }
}
