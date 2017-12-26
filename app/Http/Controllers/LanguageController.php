<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\LanguageRequest as Request;
use LanguageService;

class LanguageController extends Controller
{

    public function index()
    {
        return 'ini index';
    }


    public function create()
    {
        return 'masuk';
    }

    public function store(Request $request)
    {
        LanguageService::languageRepository()->create($request->all());

        return redirect()->back();
    }

    public function show(Language $language)
    {
        return 'ini show';
    }

    public function edit(Language $language)
    {
        return 'ini edit';
    }

    public function update(Request $request, Language $language)
    {
        //
    }

    public function destroy(Language $language)
    {
        return 'dihapus';
    }
}
