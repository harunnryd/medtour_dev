<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Http\Requests\SpecializationRequest as Request;
use SpecializationService;
use Redirect;
use View;

class SpecializationController extends Controller
{

    // public function index()
    // {
    //     //
    // }

    public function create()
    {
        return View::make('specializations.create');
    }

    public function store(Request $request)
    {
        $specialization = SpecializationService::specializationRepository()->create($request->all());

        return Redirect::to('admin?menu=specialization');

    }

    // public function show(Specialization $specialization)
    // {
    //     //
    // }

    public function edit(Specialization $specialization)
    {
        return View::make('specializations.edit')->with('specialization', $specialization);
    }

    public function update(Request $request, Specialization $specialization)
    {
        SpecializationServe::specializationRepository()->update($request->all(), $specialization->id);

        return Redirect::to('admin?menu=specialization');
    }

    public function destroy(Specialization $specialization)
    {
        SpecializationService::specializationRepository()->delete($specialization->id);

        return Redirect::back();
    }
}
