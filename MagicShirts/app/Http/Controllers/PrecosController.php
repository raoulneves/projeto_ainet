<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrecoPost;
use App\Models\Precos;
use Illuminate\Http\Request;

class PrecosController extends Controller
{
    public function admin_index()
    {
        $precos = Precos::paginate(15);
        return view('precos.admin', compact('precos'));
    }

    public function edit($id){
        $precos = Precos::FindOrFail($id);
        return view('precos.edit', compact('precos'));
    }

    public function update(PrecoPost $request, $id){
        $validated_data = $request->validated();
        $precos = Precos::findOrFail($id);
        $precos->preco_un_catalogo = $validated_data['preco_un_catalogo'];
        $precos->preco_un_proprio = $validated_data['preco_un_proprio'];
        $precos->preco_un_catalogo_desconto = $validated_data['preco_un_catalogo_desconto'];
        $precos->preco_un_proprio_desconto = $validated_data['preco_un_proprio_desconto'];
        $precos->quantidade_desconto = $validated_data['quantidade_desconto'];
        $precos->save();
        return redirect()->back()->with('alert-msg', 'Preco alterado com sucesso')->with('alert-type', 'success');
    }

    public function destroy($id)
    {
       $precos = Precos::findOrFail($id);
       $precos->delete();
       return redirect()->back()->with('alert-msg', 'Preco apagado com sucesso')->with('alert-type', 'success');
    }

}
