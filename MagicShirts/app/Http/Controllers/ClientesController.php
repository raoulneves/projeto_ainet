<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesPost;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\User;


class ClientesController extends Controller
{
    public function index(){

        $clientes = Clientes::all();
        return view('clientes.index')->withClientes($clientes);

    }


    public function admin()
    {
        $clientes = Clientes::all();
        return view('clientes.admin')->withClientes($clientes);
    }

    public function edit(Clientes $clientes)
    {
        return view('clientes.edit')
            ->withClientes($clientes);
    }
    public function create()
    {
        $clientes = new Clientes;
        return view('clientes.create')
            ->withClientes($clientes);
    }

    public function store(ClientesPost $request)
    {
        $validated_data = $request->validated();
        $newUser = new User;
        $newUser->endereco = $validated_data['endereco'];
        $newUser->name = $validated_data['name'];
        $newUser->save();
        $clientes = new Clientes;
        $clientes->user_id = $newUser->id;
        $clientes->save();
        return redirect()->route('admin.clientes')
            ->with('alert-msg', 'Cliente "' . $validated_data['nome'] . '" foi criado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function update(ClientesPost $request, Clientes $clientes)
    {
        $validated_data = $request->validated();
        $clientes->user->endereco = $validated_data['endereco'];
        $clientes->user->name = $validated_data['name'];
        $categorias->fill($validated_data);
        $clientes->save();
        return redirect()->route('admin.clientes')
            ->with('alert-msg', 'Cliente "' . $clientes->nome . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy(Clientes $clientes)
    {
        $oldName = $clientes->nome;
        $oldUserID = $clientes->user_id;
        try {
            $clientes->delete();
            User::destroy($oldUserID);
            return redirect()->route('admin.clientes')
                ->with('alert-msg', 'Cliente "' . $clientes->nome . '" foi apagado com sucesso!')
                ->with('alert-type', 'success');
        } catch (\Throwable $th) {

            if ($th->errorInfo[1] == 1451) {   // 1451 - MySQL Error number for "Cannot delete or update a parent row: a foreign key constraint fails (%s)"
                return redirect()->route('admin.clientes')
                    ->with('alert-msg', 'Não foi possível apagar o Cliente"' . $oldName . '", porque este cliente já está em uso!')
                    ->with('alert-type', 'danger');
            } else {
                return redirect()->route('admin.clientes')
                    ->with('alert-msg', 'Não foi possível apagar o Cliente"' . $oldName . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }

}
