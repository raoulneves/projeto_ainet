<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstampasPost extends FormRequest
{
    /*
     * Determine if the user is authorized to make this request.
     *
    * @return bool
    */
   public function authorize()
   {
       return true;
   }

   /*
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
       return [
        'nome' => 'required|string|max:20',
        'descricao' =>        'nullable',
        'imagem_url' =>        'required',
        'informacao_extra' =>       'required|integer|between:1,1000',

    ];
    }


}
