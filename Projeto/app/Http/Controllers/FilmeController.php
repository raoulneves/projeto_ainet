<?php

namespace App\Http\Controllers;

use App\Models\Exibicao;
use Illuminate\Http\Request;
use App\Models\Filme;
use Illuminate\Support\Facades\DB;

class FilmeController extends Controller
{
    public function index(){
        //$filmes = DB::table('filmes')->get();
        //dd($filmes);
        //return view('exibicao.index', ['filmes' => $filmes]);


        $filmes = Filme::paginate(15);
        return view('exibicao.index')->withFilmes($filmes);
    }


    public function detalheFilme(Request $request){
        $filmes = Filme::all();
        $key = $request->key;

        return view('exibicao.detalhe')->withFilmes($filmes);
    }
}
