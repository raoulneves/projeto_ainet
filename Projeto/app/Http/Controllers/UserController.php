<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Auth;

class UserController extends Controller
{
    public function perfil(){
        //obter id do utilizador logado
        $user = Auth::user()->id;
        $clientes = Clientes::where('id', '=', $user)->limit(1)->get();

        return view('perfil.index')->withClientes($clientes);
    }

    /*public function edit(Docente $docente)
    {
        $listaDepartamentos = Departamento::pluck('nome', 'abreviatura');
        return view('docentes.edit')
            ->withDocente($docente)
            ->withDepartamentos($listaDepartamentos);
    }*/
}
