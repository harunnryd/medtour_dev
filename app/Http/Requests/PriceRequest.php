<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
            'treatment_id' => 'required|exists:treatments,id',
            'price'        => 'required|integer|min:0',
            'desc'         => 'string|max:254',
        ];

        return $rule;
    }

    public function message()
    {
        // Ganti pesan Error
    }
}
