<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collect;
use willvincent\Rateable\Rating;
use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use DoctorService;
use Redirect;
use View;
use App;

class DoctorController extends Controller
{
    public function __construct($guard = 'admin')
    {
        // fix must be an instance of App\Admin, instance of App\User given in policy
        config()->set('auth.defaults.guard', $guard);
    }

    public function index()
    {
        return View::make('doctors.index');
    }

    public function create()
    {
        return View::make('doctors.create');
    }

    public function entityCreate(Doctor $doctor)
    {
        return DoctorService::viewEntity($doctor);
    }

    public function store(DoctorRequest $request)
    {
        DoctorService::createDoctor($request);
        return Redirect::to('admin?menu=doctor');
    }

    // public function entityStore(DoctorRequest $request)
    // {
    //     DoctorService::createDoctorAndEntity($request);
    //     return Redirect::to('admin?menu=doctor');
    // }

    public function show(Doctor $doctor)
    {
        $doctor = Collect::make($doctor->load(
            'entity.city.province.country',
            'entity.treatments',
            'specializations',
            'languages',
            'certifications',
            'ratings'
        ));

        return View::make('doctors.show')->with('doctor', $doctor);
    }

    public function edit(Doctor $doctor)
    {
        return DoctorService::viewDoctor($doctor);
    }

    public function update(DoctorRequest $request, Doctor $doctor)
    {
        DoctorService::updateDoctorAndEntity($request, $doctor);
        return Redirect::to('admin?menu=doctor');
    }

    public function destroy(Doctor $doctor)
    {
        DoctorService::doctorRepository()->delete($doctor->id);
        return Redirect::back();
    }

    public function comparison(Request $request)
    {
        return DoctorService::addDoctorToCookie($request);
    }

    public function remove(Request $request, $id)
    {
        return DoctorService::removeDoctorFromCookie($request, $id);
    }
}
