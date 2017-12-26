<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest as Request;
use App\Models\Country;
use CountryService;
use Redirect;
use View;

class CountryController extends Controller
{

    public function index()
    {
        return View::make('countries.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        CountryService::countryRepository()->create($request->all());

        return Redirect::back();
    }

    public function show(Country $country)
    {
        $country = CountryService::loadHospital($country->id);

        return View::make('countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        //
    }

    public function update(Request $request, Country $country)
    {
        CountryService::countryRepository()->update($request->only('name'), $country->id);

        return Redirect::back();
    }

    public function destroy(Country $country)
    {
        $country->delete();
    }
}
