<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Clientes extends FormRequest
{
    /* Determine if the user is authorized to make this request.
     *
    * @return bool
    */
   public function authorize()
   {
       return true;
   }

   /* Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
       return [
        'nif' =>         'nullable|digits:9',
        'endereco' =>    'nullable',
        'tipo_pagamento' => 'nullable|in:VISA,MC,PAYPAL',
        'ref_pagamento' =>     'nullable|digits:16', //não sei como se faz esta regra
    ];
    }
}
