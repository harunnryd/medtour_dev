<?php

namespace App\Supports;

use DB;
use Alert;
use App\Http\Requests\PriceRequest;
use Illuminate\Database\QueryException;

class PriceService
{

    public function showPrice($entity_id, $treatment_id)
    {
        $data = DB::table('entity_treatment')->where('entity_id', $entity_id)
                                             ->where('treatment_id', $treatment_id)
                                             ->first();
        return $data;
    }

    public function create(PriceRequest $request)
    {
        try {
            $dataPrice = $request->except(['_token']);

            $pivot = DB::table('entity_treatment')->whereExists(function ($q) use ($request) {
                $q->whereEntityId($request->entity_id)->whereTreatmentId($request->treatment_id);
            });

            if ($pivot->first()) {
                $pivot->update($dataPrice);
            } else {
                $pivot->insert($dataPrice);
            }
        } catch (QueryException $e) {
            return Alert::info("Query :'(", "Error");
        }
    }
}
