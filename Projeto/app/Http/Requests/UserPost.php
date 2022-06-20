<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPost extends FormRequest
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
            'name' =>         'required',
            'nif' =>         'required',
            'ref_pagamento' =>         'required',
            'tipo_pagamento' =>         'required',
            'foto_url' =>         'nullable|image|max:8192',   // Máximum size = 8Mb
        ];
    }
}
