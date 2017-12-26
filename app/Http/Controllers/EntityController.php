<?php

namespace App\Http\Controllers;

use View;
use EntityService;
use App\Models\Entity;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;

class EntityController extends Controller
{

    public function home() {
        return View::make('entities.index');
    }

    public function search(SearchRequest $request)
    {
        $collection = EntityService::search($request);
        return View::make('entities.search')->with('collection', $collection);
    }

    // public function create()
    // {
    //     //
    // }
    //
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // public function show(Entity $entity)
    // {
    //     //
    // }
    //
    // public function edit(Entity $entity)
    // {
    //     //
    // }
    //
    // public function update(Request $request, Entity $entity)
    // {
    //     //
    // }
    //
    // public function destroy(Entity $entity)
    // {
    //     //
    // }
}
