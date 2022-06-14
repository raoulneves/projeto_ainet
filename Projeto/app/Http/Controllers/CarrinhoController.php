<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarrinhosPost;
use App\Http\Requests\ProductPost;
use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Filme;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        return view('carrinho.index')
        ->with('pageTitle', 'Carrinho de Compras')
        ->with('carrinho', session('carrinho') ?? []);
    }


    /*public function store_filme(ProductPost $request)
    {
        //$request->validated();
        $carrinho = $request->session()->get('carrinho', []);
        $key = "$request->filme_id";
        dd($key);
        //$preco = Preco::find(1);
        $filme = Filme::find($request->filme_id);

        if (empty($carrinho)) {
            $carrinho['precoTotal'] = 0;
            $carrinho['quantidadeItens'] = 0;
        } else {
            if (array_key_exists($key, $carrinho['items'])) {
                $quantidade = $carrinho['items'][$key]['quantidade'] + $request->quantidade;
                $carrinho['items'][$key]['quantidade'] = $quantidade;

                if ($quantidade >= $preco['quantidade_desconto']) {
                    $oldSubtotal = $carrinho['items'][$key]['subtotal'];

                    if ($filme['cliente_id'] != null) {
                        $precoFilme = $preco['preco_un_proprio_desconto'];
                    } else {
                        $precoFilme = $preco['preco_un_catalogo_desconto'];
                    }

                    $newSubtotal = $precoFilme * $quantidade;

                    $carrinho['items'][$key]['preco_un'] = $precoFilme;
                    $carrinho['items'][$key]['subtotal'] = $newSubtotal;
                    $carrinho['precoTotal'] -= $oldSubtotal;
                    $carrinho['precoTotal'] += $newSubtotal;
                }

                $request->session()->put('carrinho', $carrinho);
                return back()
                    ->with('alert-msg', 'Foi adicionada um filme ao carrinho!')
                    ->with('alert-type', 'success');
            }
        }
    }*/

    public function store_filme(Request $request, Filme $filme){
        $carrinho = $request->session()->get('carrinho', []);
        $filme = Filme::find($request->filme_id);
        $qtd = ($carrinho[$filme->id]['qtd'] ?? 0) + 1;

        $carrinho[$filme->id] = [
            'id' => $filme->id,
            'qtd' => $qtd,
            'titulo' => $filme->titulo,
            'ano' => $filme->ano,
            'genero' => $filme->genero_code
        ];
        $request->session()->put('carrinho', $carrinho);
        return back()
        ->with('alert-msg', 'Foi adicionado ao carrinho!')
        ->with('alert-type', 'success');
    }

    public function update_filme(Request $request, Filme $filme){
        $carrinho = $request->session()->get('carrinho', []);
        $qtd = $carrinho[$filme->id]['qtd'] ?? 0;
        $qtd += $request->quantidade;
        if($request->quantidade < 0){
            $msg = 'Removido ' . $request->quantidade . ' ao carrinho.';
        }
        elseif ($request->quantidade > 0){
            $msg = 'Adicionado ' . $request->quantidade . ' ao carrinho.';
        }
        if($qtd <= 0){
            unset($carrinho[$filme->id]);
            $msg = 'Foram removidos todos os produtos do carrinho "' . $filme->titulo . '"';
        }
        else{
            $carrinho[$filme->id]['qtd'] = $qtd;
        }
        $request->session()->put('carrinho', $carrinho);

        return back()
            ->with('alert-msg', $msg)
            ->with('alert-type', 'info');
    }

    public function destroy_filme(Request $request, Filme $filme){
        $carrinho = $request->session()->get('carrinho', []);
        if(array_key_exists($filme->id, $carrinho)){
            unset($carrinho[$filme->id]);
            $request->session()->put('carrinho', $carrinho);
            return back()
                ->with('alert-msg', 'Filme removido.')
                ->with('alert-type', 'success');
        }
        return back()
            ->with('alert-msg', 'Erro')
            ->with('alert-type', 'warning');
    }
}
