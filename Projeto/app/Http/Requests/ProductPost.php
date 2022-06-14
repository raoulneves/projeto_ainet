<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPost extends FormRequest
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
            'filme_id' =>  'required|exists:filmes,id',
            //'cor_codigo' =>  'required|exists:cores,codigo',
            //'tamanho' =>     'required|in:XS,S,M,L,XL',
            'quantidade' =>  'required|integer|min:1',
            'preco' =>    'nullable',
        ];
    }

    public function messages()
    {
        return [
            //'cor_codigo.required' => 'Deve selecionar uma cor para a T-Shirt',
            //'tamanho.required' => 'Deve escolher o tamanho da T-Shirt',
            'quantidade.required' => 'Tem que inserir um valor para a quantidade',
        ];
    }
}
