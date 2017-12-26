<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Requests\ProvinceRequest as Request;
use ProvinceService;

class ProvinceController extends Controller
{

    public function index()
    {
        return view('provinces.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        provinceService::provinceRepository()->create($request->all());

        return redirect()->back();
    }

    public function show(Province $province)
    {
        //
    }

    public function edit(Province $province)
    {
        //
    }

    public function update(Request $request, Province $province)
    {
        ProvinceService::provinceRepository()->update($request->only('country_id', 'name'), $province->id);

        return redirect()->back();
    }

    public function destroy(Province $province)
    {
        //
    }
}
