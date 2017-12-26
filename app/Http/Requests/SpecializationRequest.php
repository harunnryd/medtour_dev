<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecializationRequest extends FormRequest
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
            'type' => 'required|string|between:1,100|unique:specializations,type',
        ];

        if ($this->isMethod('patch')) {
            $rule['type']   .= ','. $this->get('id');
        }   return $rule;
    }
}
