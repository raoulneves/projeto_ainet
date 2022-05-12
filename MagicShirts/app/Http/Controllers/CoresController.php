<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoresPost;
use App\Models\Cores;
use Illuminate\Http\Request;

class CoresController extends Controller
{
    public function admin_index()
    {
        $cores = Cores::paginate(15);
        return view('cores.admin', compact('cores'));
    }

    public function edit($codigo){
        $cores = Cores::FindOrFail($codigo);
        return view('cores.edit', compact('cores'));
    }
    public function update(CoresPost $request, $codigo){
        $validated_data = $request->validated();
        $cor = Cores::findOrFail($codigo);
        $cor->nome = $validated_data['nome'];
        $cor->save();
        return redirect()->back()->with('alert-msg', 'Cor alterado com sucesso')->with('alert-type', 'success');
    }

    public function destroy($codigo)
    {
       $cor = Cores::findOrFail($codigo);
       $cor->delete();
       return redirect()->back()->with('alert-msg', 'Cor apagado com sucesso')->with('alert-type', 'success');
    }
}
