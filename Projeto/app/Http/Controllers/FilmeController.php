<?php

namespace App\Http\Controllers;

use App\Models\Exibicao;
use Illuminate\Http\Request;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Sessoes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function index()
    {
        /*  Feito nas aulas
        $filmes = DB::table('filmes')->get();
        dd($filmes);
        return view('exibicao.index', ['filmes' => $filmes]);
        $filmes = Filme::paginate(15);
        */

        //Recupera lista com os filme_id dos filmes com data hoje ou posterior
        $listaSessoes = Sessoes::whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->pluck('filme_id');

        //Recupera lista com filmes
        $filmes = Filme::whereIn('id', $listaSessoes)
            ->get();


        return view('exibicao.index')->with('filmes', $filmes);
    }


    public function detalheFilme($id)
    {
        $filme = Filme::find($id);
        $sessoes = Sessoes::whereIn('filme_id', $filme)
            ->whereDate('data', '>=', Carbon::now('Europe/Lisbon'))
            ->get();
        return view('exibicao.detalhe')
            ->withFilme($filme)
            ->withSessoes($sessoes);
    }

    public function admin_index()
    {
        $filmes = Filme::paginate(10);
        return view('exibicao.admin')->withFilmes($filmes);
    }

    /*public function edit(Aluno $aluno)
    {
        $listaCursos = Curso::pluck('nome', 'abreviatura');
        return view('alunos.edit')
            ->withAluno($aluno)
            ->withCursos($listaCursos);
    }*/

    public function create()
    {
        $genero = Genero::pluck('nome');
        $filme = new Filme;
        return view('alunos.create')
            ->withFilme($filme)
            ->withGenero($genero);
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
