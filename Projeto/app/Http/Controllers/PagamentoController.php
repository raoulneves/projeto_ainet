<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;
use Illuminate\Support\Facades\Auth;

class PagamentoController extends Controller
{
    public function index()
    {
        return view('pagamento.index')
        ->with('pageTitle', 'Pagamento')
        ->with('carrinho', session('carrinho') ?? []);
    }
}
