<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarrinhosPost;
use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Estampas;

class CarrinhoController extends Controller
{
    public function index()
    {
        return view('carrinho.index')
        ->with('pageTitle', 'Carrinho de Compras')
        ->with('carrinho', session('carrinho') ?? []);
    }

    public function show_estampa($id){
        $estampa = Estampas::find($id);
        return view('estampas.estampa_detalhes',compact('estampa'));
    }

    public function store_estampa(Request $request, Estampas $estampa){
        $carrinho = $request->session()->get('carrinho', []);
        $estampa = Estampas::find($request->estampa_id);
        $qtd = ($carrinho[$estampa->id]['qtd'] ?? 0) + 1;
        $carrinho[$estampa->id] = [
            'id' => $estampa->id,
            'qtd' => $qtd,
            'nome' => $estampa->nome,
            'tamanho' => $request->tamanho,
            'cor' => $request->cor
        ];
        $request->session()->put('carrinho', $carrinho);
        return back()
        ->with('alert-msg', 'Foi adicionado ao carrinho')
        ->with('alert-type', 'success');
    }

    public function update_estampa(Request $request, Estampas $estampa){
        $carrinho = $request->session()->get('carrinho', []);
        $qtd = $carrinho[$estampa->id]['qtd'] ?? 0;
        $qtd += $request->quantidade;
        if($request->quantidade < 0){
            $msg = 'Foram removidas ';
        }
        elseif ($request-> quantidade > 0){
            $msg = 'Foram adicionadas';
        }
        if($qtd <= 0){
            unset($carrinho[$estampa->id]);
            $msg = 'Foram removidas todos os produtos do carrinho "' . $estampa->nome . '"';
        }
        else{
            $carrinho[$estampa->id]['qtd'] = $qtd;
        }
        $request->session()->put('carrinho', $carrinho);
        return back();
    }

    public function destroy_estampa(Request $request, Estampas $estampa){
        $carrinho = $request->session()->get('carrinho', []);
        if(array_key_exists($estampa->id, $carrinho)){
            unset($carrinho[$estampa->id]);
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
