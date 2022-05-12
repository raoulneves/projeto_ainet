<?php

namespace App\Http\Controllers;
use App\Http\Requests\TshirtsPost;
use Illuminate\Http\Request;
use App\Models\Tshirts;
use App\Http\Requests\PostTshirtsUpdateRequest;

class TshirtsController extends Controller
{
    public function index()
    {
        $tshirts = Tshirts::all();
        return view('tshirts.index')->with('tshirts',$tshirts);
    }


    public function admin_index()
    {
        $tshirts = Tshirts::paginate(15);
        return view('tshirts.admin', compact('tshirts'));
    }

    public function edit($id){
        $tshirts = Tshirts::FindOrFail($id);
        return view('tshirts.edit', compact('tshirts'));
    }

    public function update(PostTshirtsUpdateRequest $request, $id){
        $validated_data = $request->validated();
        $tshirts = Tshirts::findOrFail($id);
        $tshirts->cor_codigo = $validated_data['cor_codigo'];
        $tshirts->tamanho = $validated_data['tamanho'];
        $tshirts->quantidade = $validated_data['quantidade'];
        $tshirts->preco_un = $validated_data['preco_un'];
        $tshirts->subtotal = $tshirts->quantidade*$tshirts->preco_un;
        $tshirts->save();
        return redirect()->back()->with('alert-msg', 'Utilizador alterado com sucesso')->with('alert-type', 'success');
    }

    public function destroy($id)
    {
       $tshirts = Tshirts::findOrFail($id);
       $tshirts->delete();
       return redirect()->back()->with('alert-msg', 'Utilizador apagado com sucesso')->with('alert-type', 'success');
    }
}

