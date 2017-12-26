<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalRequest extends FormRequest
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
        $rule = [
            'name'           => 'required|string|max:100',
            'beds'           => 'required|integer|min:0',
            'inpatients'     => 'required|integer|min:0',
            'outpatients'    => 'required|integer|min:0',
            //entities
            'photo'          => 'image|mimes:jpeg,jpg,bmp,png|max:10240|unique:entities,photo',
            'address'        => 'required|string|max:100',
            'contact'        => 'required|string|max:16|unique:entities,contact',
            'city_id'        => 'required|integer|exists:cities,id',
        ];

        if ($this->isMethod('patch')) {
            $rule['photo']   .= ','. $this->get('id');
            $rule['contact'] .= ','. $this->get('id');
        }   return $rule;
    }
}
