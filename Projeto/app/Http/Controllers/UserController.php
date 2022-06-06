<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function perfil(){
        return view('perfil.index');
    }

    public function edit(Docente $docente)
    {
        $listaDepartamentos = Departamento::pluck('nome', 'abreviatura');
        return view('docentes.edit')
            ->withDocente($docente)
            ->withDepartamentos($listaDepartamentos);
    }
}
