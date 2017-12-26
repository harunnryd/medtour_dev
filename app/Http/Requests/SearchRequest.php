<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'specialization' => 'string|exists:specializations,slug',
            'country'        => 'string|exists:countries,slug',
            'province'       => 'string|exists:provinces,slug',
            'cities'         => 'string|exists:cities,slug',
            'view'           => 'string|in:doctor,hospital',
        ];
    }
}
