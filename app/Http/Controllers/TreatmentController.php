<?php

namespace App\Http\Controllers;

use View;
use Redirect;
use TreatmentService;
use App\Models\Treatment;
use App\Http\Requests\TreatmentRequest as Request;

class TreatmentController extends Controller
{

    // public function index()
    // {
    //     //
    // }

    public function create()
    {
        return View::make('treatments.create');
    }

    public function store(Request $request)
    {
        $treatment = TreatmentService::create($request);

        return Redirect::to('admin?menu=treatment');
    }

    // public function show(Treatment $treatment)
    // {
    //     //
    // }

    public function edit(Treatment $treatment)
    {
        return View::make('treatments.edit')->with('treatment', $treatment);
    }

    public function update(Request $request, Treatment $treatment)
    {
        TreatmentService::treatmentRepository()->update($request->all(), $treatment->id);

        return Redirect::to('admin?menu=treatment');
    }

    public function destroy(Treatment $treatment)
    {
        TreatmentService::specializationRepository()->delete($specialization->id);

        return Redirect::back();
    }
}
