<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarrinhosPost;
use App\Http\Requests\ProductPost;
use App\Models\Carrinho;
use App\Models\Filme;
use App\Models\Sessoes;
use Carbon\Carbon;

class PagamentoController extends Controller
{
    public function index(Request $request)
    {
        $carrinho = $request->session()->get('carrinho', []);

        $metPagamento = 0;
        if($request->payment_option == "VISA"){
            $metPagamento = 1;
        }elseif($request->payment_option == "PAYPAL"){
            $metPagamento = 2;
        }elseif($request->payment_option == "MBWAY"){
            $metPagamento = 3;
        }

        $id_filmes_array = array_keys($carrinho);

        $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->whereIn('filme_id', $id_filmes_array)
            ->get();

        return view('pagamento.index')
            ->with('carrinho',$carrinho)
            ->with('sessions', $listaSessoes)
            ->with('metPagamento', $metPagamento);
    }

    public function pagamento_option(Request $request)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $id_filmes_array = array_keys($carrinho);

        $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->whereIn('filme_id', $id_filmes_array)
            ->get();

        if($request->payment_option == "VISA"){
            $metPagamento = 1;
        }elseif($request->payment_option == "PAYPAL"){
            $metPagamento = 2;
        }elseif($request->payment_option == "MBWAY"){
            $metPagamento = 3;
        }
        dd($metPagamento);

        return back()
            ->with('carrinho',$carrinho)
            ->with('sessions', $listaSessoes)
            ->with('metPagamento', $metPagamento);
    }

}
