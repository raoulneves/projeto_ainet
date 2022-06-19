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
        $sessao = $request->sessionSel;

        return view('pagamento.index')
            ->with('carrinho',$carrinho)
            ->with('session', $sessao);
    }
}
