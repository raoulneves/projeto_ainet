<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tshirts extends FormRequest
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
        'tamanho' =>        'required|in:XS,S,M,L,XL',
        'quantidade' =>     'required|integer|between:1,100', //nao sei fazer
        'preco_un' =>       'required|integer|between:1,100', //nao sei fazer
        'subtotal' =>       'required|integer|between:1,1000', //nao sei fazer

    ];
    }
}