<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Http\Requests\SalaPost;

class SalaController extends Controller
{
    public function admin_index(){
        $salas = Sala::paginate(10);
        //$salas = $sala->get();
        return view('salas.admin')->withSalas($salas);
    }

    public function edit(Sala $sala)
    {
        //$listaSalas = Sala::pluck('nome');
        return view('salas.edit')
            ->withSala($sala);
    }

    public function update(SalaPost $request, Sala $sala)
    {
        $validated_data = $request->validated();
        $sala->nome = $validated_data['nome'];
        $sala->save();
        return redirect()->route('admin.salas')
            ->with('alert-msg', 'Sala "' . $sala->nome . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function create()
    {
        $sala = new Sala;
        return view('salas.create')
            ->with('sala', $sala);
    }

    public function store(SalaPost $request)
    {
        $newSala = Sala::create($request->validated());
        return redirect()->route('admin.salas')
            ->with('alert-msg', 'Sala "' . $newSala->nome . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $oldName = $sala->nome;
        $oldSalaID = $sala->id;
        try {
            $sala->delete();
            Sala::destroy($oldSalaID);
            return redirect()->route('admin.salas')
                ->with('alert-msg', 'Sala "' . $sala->nome . '" foi apagado com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {
            // $th é a exceção lançada pelo sistema - por norma, erro ocorre no servidor BD MySQL
            // Descomentar a próxima linha para verificar qual a informação que a exceção tem
            //dd($th, $th->errorInfo);

            if ($th->errorInfo[1] == 1451) {   // 1451 - MySQL Error number for "Cannot delete or update a parent row: a foreign key constraint fails (%s)"
                return redirect()->route('admin.salas')
                    ->with('alert-msg', 'Não foi possível apagar a sala "' . $oldName . '", porque esta sala já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.salas')
                    ->with('alert-msg', 'Não foi possível apagar a sala "' . $oldName . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }
}
