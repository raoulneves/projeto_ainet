<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Encomendas extends FormRequest
{
    /
     * Determine if the user is authorized to make this request.
     *
    * @return bool
    */
   public function authorize()
   {
       return true;
   }

   /
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
       return [
        'estado' =>         'required|in:pendente,pagam,fechada,anulada',,
        'data' => 'required|date_format:"Y-m-d"|before:today',
        'preço_total' =>        'required',
        'notas' =>        'nullable',
        'nif' =>       'nullable|digits:9',
        'endereco' =>       'required|integer|between:1,1000',
        'tipo_pagamento' =>       'nullable|in:VISA,MC,PAYPAL',
        'ref_pagamento' =>       'required|integer|between:1,1000',
        'recibo_url' =>       'required|integer|between:1,1000',

    ];
    }


}