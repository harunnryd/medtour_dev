<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'id'              => 'exists:entities,id',
            'name'            => 'required|string|max:35',
            'gender'          => 'required|in:L,P',
            'experience'      => 'date|after:20 February 1997',
            'specializations' => 'required_with:id|exists:specializations,id',
            'languages'       => 'required_with:id|exists:languages,id',
            //entities
            'photo'           => 'image|mimes:jpeg,jpg,bmp,png|max:10240|unique:entities,photo',
            'address'         => 'required_with:id|string|max:100',
            'contact'         => 'required_with:id|string|max:16|unique:entities,contact',
            'city_id'         => 'required_with:id|integer|exists:cities,id',
            //validate untuk compare doctor
            'doctor_id'       => 'exists:doctors,id',
        ];

        if ($this->isMethod('patch')) {
            $rule['photo']   .= ','. $this->get('id');
            $rule['contact'] .= ','. $this->get('id');
        }   return $rule;
    }

    public function messages()
    {
        return [
            'specializations.required_with' => 'The :attribute field is required.',
            'languages.required_with'       => 'The :attribute field is required.',
            'address.required_with'         => 'The :attribute field is required.',
            'contact.required_with'         => 'The :attribute field is required.',
            'city_id.required_with'         => 'The :attribute field is required.',
        ];
    }
}


