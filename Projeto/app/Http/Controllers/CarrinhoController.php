<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarrinhosPost;
use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Filme;

class CarrinhoController extends Controller
{
    public function index()
    {
        return view('carrinho.index')
        ->with('pageTitle', 'Carrinho de Compras')
        ->with('carrinho', session('carrinho') ?? []);
    }

    public function store_filme(Request $request, Filme $filme){
        $carrinho = $request->session()->get('carrinho', []);
        $filme = Filme::find($request->filme_id);
        $qtd = ($carrinho[$filme->id]['qtd'] ?? 0) + 1;
        $carrinho[$filme->id] = [
            'id' => $filme->id,
            'qtd' => $qtd,
            'titulo' => $filme->titulo,
            'ano' => $filme->ano,
            'genero' => $filme->genero
        ];
        $request->session()->put('carrinho', $carrinho);
        return back()
        ->with('alert-msg', 'Foi adicionado ao carrinho')
        ->with('alert-type', 'success');
    }

    public function update_filme(Request $request, Filme $filme){
        $carrinho = $request->session()->get('carrinho', []);
        $qtd = $carrinho[$filme->id]['qtd'] ?? 0;
        $qtd += $request->quantidade;
        if($request->quantidade < 0){
            $msg = 'Foram removidas ';
        }
        elseif ($request-> quantidade > 0){
            $msg = 'Foram adicionadas';
        }
        if($qtd <= 0){
            unset($carrinho[$filme->id]);
            $msg = 'Foram removidas todos os produtos do carrinho "' . $filme->titulo . '"';
        }
        else{
            $carrinho[$filme->id]['qtd'] = $qtd;
        }
        $request->session()->put('carrinho', $carrinho);
        return back();
    }

    public function destroy_filme(Request $request, Filme $filme){
        $carrinho = $request->session()->get('carrinho', []);
        if(array_key_exists($filme->id, $carrinho)){
            unset($carrinho[$filme->id]);
            $request->session()->put('carrinho', $carrinho);
            return back()
                ->with('alert-msg', 'Foram removidas')
                ->with('alert-type', 'success');
        }
        return back()
            ->with('alert-msg', 'A estampa')
            ->with('alert-type', 'warning');
    }
}
