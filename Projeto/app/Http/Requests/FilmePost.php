<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilmePost extends FormRequest
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
            'titulo' =>         'required',
            'genero_code' =>         'required',
            'ano' =>         'required',
            'sumario' =>         'required',
            'trailer' =>         'required',
            'foto' =>         'nullable|image|max:8192',   // Máximum size = 8Mb
        ];
    }
}
