<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarrinhosPost;
use App\Http\Requests\ProductPost;
use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Filme;
use Illuminate\Support\Facades\Auth;
use App\Models\Sessoes;
use Carbon\Carbon;

class CarrinhoController extends Controller
{
    public function index(Request $request)
    {

        $carrinho = $request->session()->get('carrinho', []);

        $id_filmes_array = array_keys($carrinho);

        $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->whereIn('filme_id', $id_filmes_array)
            ->get();


        /* CENAS QUE PODEM SER UTEIS

        $id_film_list = json_encode($id_filmes_array);
        dd($sessoes_filme);
        $sessoes_filme = [];
        foreach ($carrinho as $filme) {
            $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
                ->where('filme_id','=', $filme["id"])
                ->get();
            $sessoes_filme[$filme["id"]] = $listaSessoes;
        }
        Recupera lista com os filme_id dos filmes com data hoje ou posterior
        $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->whereIn('filme_id', $id_film_list);
        Recupera as sessoes para um filme
        $sessoes = Sessoes::where('filme_id', '=', $filme["id"])
            ->whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->get();
        */

        return view('carrinho.index')
            ->with('pageTitle', 'Carrinho de Compras')
            ->with('carrinho', session('carrinho') ?? [])
            ->with('listaSessoes', $listaSessoes);
    }

    public function store_filme(Request $request, Filme $filme)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $filme = Filme::find($request->filme_id);
        $qtd = ($carrinho[$filme->id]['qtd'] ?? 0) + 1;

        $carrinho[$filme->id] = [
            'id' => $filme->id,
            'qtd' => $qtd,
            'titulo' => $filme->titulo,
            'ano' => $filme->ano,
            'genero' => $filme->genero_code,
            'sessao' => ''
        ];
        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', 'Foi adicionado ao carrinho!')
            ->with('alert-type', 'success');
    }

    public function update_filme(Request $request, Filme $filme)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $qtd = $carrinho[$filme->id]['qtd'] ?? 0;
        $qtd += $request->quantidade;
        if ($request->quantidade < 0) {
            $msg = 'Removido ' . $request->quantidade . ' ao carrinho.';
        } elseif ($request->quantidade > 0) {
            $msg = 'Adicionado ' . $request->quantidade . ' ao carrinho.';
        }
        if ($qtd <= 0) {
            unset($carrinho[$filme->id]);
            $msg = 'Foram removidos todos os produtos do carrinho "' . $filme->titulo . '"';
        } else {
            $carrinho[$filme->id]['qtd'] = $qtd;
        }
        $request->session()->put('carrinho', $carrinho);

        return back()
            ->with('alert-msg', $msg)
            ->with('alert-type', 'info');
    }

    public function destroy_filme(Request $request, Filme $filme)
    {
        $carrinho = $request->session()->get('carrinho', []);
        if (array_key_exists($filme->id, $carrinho)) {
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

    public function update_sessao(Request $request, Filme $filme)
    {
        $carrinho = $request->session()->get('carrinho', []);

        $session = $carrinho[$filme->id]['sessao'] ?? 0;
        $session = $request->sessionSel;

        $carrinho[$filme->id]['sessao'] = $session;

        $request->session()->put('carrinho', $carrinho);

        return back()
            ->with('alert-msg', 'Sessão selecionada!')
            ->with('alert-type', 'info');
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
}
