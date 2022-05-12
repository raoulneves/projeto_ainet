<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecoPost extends FormRequest
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
        'preco_un_catalogo' =>         'required',
        'preco_un_proprio' =>    'required',
        'preco_un_catalogo_desconto' => 'required',
        'preco_un_proprio_desconto' =>        'required',
        'quantidade_desconto' =>        'required|integer|between:1,100',
    ];
    }


}
