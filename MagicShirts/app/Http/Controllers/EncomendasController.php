<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomendas;

class EncomendasController extends Controller
{
    /*public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index')->withCategorias($categorias);
    }*/

    public function index()
    {
        return view('encomendas.index');
    }
}
