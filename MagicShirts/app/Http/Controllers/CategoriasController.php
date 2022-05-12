<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoriasPost;
use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{

    public function admin_index()
    {
        $categorias = Categorias::paginate(15);
        return view('categorias.admin', compact('categorias'));
    }

    public function edit($id){
        $categoria = Categorias::FindOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }


    public function destroy($id)
    {
       $categoria = Categorias::findOrFail($id);
       $categoria->delete();
       return redirect()->back()->with('alert-msg', 'Categoria apagada com sucesso')->with('alert-type', 'success');
    }

    public function update(CategoriasPost $request, $id){
        $validated_data = $request->validated();
        $categoria = Categorias::findOrFail($id);
        $categoria->nome = $validated_data['nome'];
        $categoria->save();
        return redirect()->back()->with('alert-msg', 'Categoria alterada com sucesso')->with('alert-type', 'success');
    }

}
