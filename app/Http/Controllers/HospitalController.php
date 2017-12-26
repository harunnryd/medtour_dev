<?php

namespace App\Http\Controllers;

use View;
use Response;
use Redirect;
use HospitalService;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Requests\HospitalRequest;
use Illuminate\Support\Collection as Collect;

class HospitalController extends Controller
{
    public function __construct($guard = 'admin') {
        // fix must be an instance of App\Admin, instance of App\User given in policy
        config()->set('auth.defaults.guard', $guard);
    }

    public function index()
    {
        return View::make('hospitals.index');
    }

    public function create()
    {
        return View::make('hospitals.create');
    }

    public function store(HospitalRequest $request)
    {
        HospitalService::createHospitalAndEntity($request);
        return Response::json(['success' => 'berhasil menambahkan data'], 201);
    }

    public function show(Hospital $hospital)
    {
        $hospital = Collect::make($hospital->load('entity.city.province.country', 'facilities', 'practices.specializations'));
        return View::make('hospitals.show')->with('hospital', $hospital);
    }

    public function edit(Hospital $hospital)
    {
        return View::make('hospitals.edit')->with('hospital', $hospital);
    }

    public function update(HospitalRequest $request, Hospital $hospital)
    {
        HospitalService::updateHospitalAndEntity($request, $hospital);
        return Redirect::route('admin.hospital.index');
    }

    public function destroy(Hospital $hospital)
    {
        HospitalService::hospitalRepository()->delete($hospital->id);
        return Redirect::back();
    }
}
