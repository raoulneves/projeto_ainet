<?php

namespace App\Http\Controllers;

use App\Models\Exibicao;
use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Generos;
use App\Models\Sessoes;
use App\Models\Bilhetes;
use App\Models\Lugares;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FilmePost;

class FilmeController extends Controller
{
    public function index(Request $request)
    {
        /*  Feito nas aulas
        $filmes = DB::table('filmes')->get();
        dd($filmes);
        return view('exibicao.index', ['filmes' => $filmes]);
        $filmes = Filme::paginate(15);
        */

        //Recupera lista com os filme_id dos filmes com data hoje ou posterior
        $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->groupBy('filme_id')
            ->pluck('filme_id');


        $genres = Generos::all();

        //Variavel  com codigo go genero a filtrar por
        $keygen = $request->keygen;
        //Verifica se foi filtrado por um genero
        if (isset($request->keygen)) {
            $selected_genre = $request->keygen;
            $filmes = Filme::where('genero_code', '=', $keygen)
                ->paginate(15);
        } else {
            //Recupera lista com filmes
            $filmes = Filme::whereIn('id', $listaSessoes)
                ->get();
            $selected_genre = null;
        }

        return view('exibicao.index')
            ->with('filmes', $filmes)
            ->with('genres', $genres)
            ->with('selectedgenre', $selected_genre);
    }

    public function index_filter(Request $request)
    {
        $genres = Generos::all();
        $key = $request->key;
        $filmes = Filme::where('titulo', 'LIKE', '%' . $key . '%')
            ->orwhere('sumario', 'LIKE', '%' . $key . '%')
            ->paginate(15);

        return view('exibicao.index')
            ->with('filmes', $filmes)
            ->with('genres', $genres);
    }


    public function detalheFilme($id)
    {
        //Recupera lista com os filme_id dos filmes com data hoje ou posterior
        $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->paginate(4)
            ->pluck('filme_id');

        //Recupera lista com filmes
        $filmesRelacionados = Filme::whereIn('id', $listaSessoes)
            ->get();

        //Recupea o filme a partir do id
        $filme = Filme::find($id);

        //Recupera as sessoes para um filme
        $sessoes = Sessoes::where('filme_id', '=', $filme["id"])
            ->whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->get();


        //Para iterar primeira dimensao do array
        $sessao_counter = 0;
        foreach ($sessoes as $sessao) {
            //Calcula o total de lugares para uma sala
            $totalSeats = Lugares::where('sala_id', '=', $sessao["sala_id"])->count();

            //Calcula o total de bilhetes para a sessao
            $totalTicketsSession = Bilhetes::where('sessao_id', '=', $sessao["id"])->count();

            //Calcula as vagas
            $available_seats = $totalSeats - $totalTicketsSession;

            //Insere o numero de vagas como key => value no array sessoes que é passado
            $sessoes[$sessao_counter]["seats_remaining"] = $available_seats;

            //Incrementa a var para iterar o array
            $sessao_counter++;
        }

        return view('exibicao.detalhe')
            ->with('filme', $filme)
            ->with('sessoes', $sessoes)
            ->with('filmesRelacionados', $filmesRelacionados);
    }

    public function admin_index()
    {
        $filmes = Filme::paginate(10);
        return view('exibicao.admin')->with('filmes', $filmes);
    }

    public function edit(Filme $filme)
    {
        return view('exibicao.edit')->with('filme', $filme);
    }

    public function update(FilmePost $request, Filme $filme)
    {
        $validated_data = $request->validated();
        $filme->titulo = $validated_data['titulo'];
        $filme->genero_code = $validated_data['genero_code'];
        $filme->ano = $validated_data['ano'];
        $filme->sumario = $validated_data['sumario'];
        $filme->trailer_url = $validated_data['trailer'];
        if ($request->hasFile('foto')) {
            Storage::delete('cartazes/' . $filme->cartaz_url);
            $path = $request->cartaz_url->store('cartazes');
            $filme->cartaz_url = basename($path);
        }
        $filme->save();
        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function create()
    {
        $genero = Generos::pluck('nome');
        $filme = new Filme;
        return view('alunos.create')
            ->with('filme', $filme)
            ->with('genero', $genero);
    }

    public function store(FilmePost $request)
    {
        $newFilme = Filme::create($request->validated());
        return redirect()->route('admin.filmes')
            ->with('alert-msg', 'Disciplina "' . $newFilme->Titulo . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy(Filme $filme)
    {
        $oldName = $filme->titulo;
        $oldFilmeID = $filme->id;
        $oldUrlFoto = $filme->cartaz_url;
        try {
            $filme->delete();
            Filme::destroy($oldFilmeID);
            Storage::delete('public/storage/cartazes' . $oldUrlFoto);
            return redirect()->route('admin.filmes')
                ->with('alert-msg', 'Filme "' . $filme->titulo . '" foi apagado com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            // $th é a exceção lançada pelo sistema - por norma, erro ocorre no servidor BD MySQL
            // Descomentar a próxima linha para verificar qual a informação que a exceção tem
            //dd($th, $th->errorInfo);

            if ($th->errorInfo[1] == 1451) {   // 1451 - MySQL Error number for "Cannot delete or update a parent row: a foreign key constraint fails (%s)"
                return redirect()->route('admin.filmes')
                    ->with('alert-msg', 'Não foi possível apagar o filme "' . $oldName . '", porque este filme já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.filmes')
                    ->with('alert-msg', 'Não foi possível apagar o filme "' . $oldName . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }
}
