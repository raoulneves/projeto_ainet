<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstampasPost;
use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Models\Estampas;
use Illuminate\Support\Facades\Auth;

class EstampasController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categorias::all();
        $estampas = Estampas::paginate(9);
        //$docentes = $disciplina->docentes;
        //$estampas = $categorias -> $estampas;
        return view('estampas.index')
        ->with('estampas',$estampas)
        ->with('categorias', $categorias);
    }

    public function index_filter(Request $request)
    {
        $categorias = Categorias::all();
        $key = $request->key;
        $estampas = Estampas::where('nome', 'LIKE', '%' . $key . '%')->orwhere('descricao', 'LIKE', '%' . $key . '%')->paginate(15);

        return view('estampas.index')
        ->with('estampas',$estampas)
        ->with('categorias', $categorias);
    }

    /*public function index(Request $request)
    {
        $ListaCategorias = Categorias::all();
        $id =$request->query('categoria', $ListaCategorias[0]->id);
        $categorias = Categorias::findOrFail($id);
        $estampas = $categorias -> estampas;
        return view(
            'estampas.index',
            compact('estampas', 'ListaCategorias', 'categorias')
        );
    }*/

    public function estampasPrivadas(){
        $user = Auth::User();
        $estampas = Estampas::where('cliente_id', $user->id)->paginate(15);
        return view('estampas.privadas.index', compact('estampas'));
    }
    public function getEstampa(Estampas $estampa){
            //NOTA: devem implementar verificação (exemplo: Policy) para verificar se o utilizador tem permissão de acesso à imagem/estampa à qual está a aceder (para não permitir que um user acesse a uma estampa que não seja dele, exceto se for Admin/Funcionário)

        if ($estampa->imagem_url) {
            return response()->file(storage_path().'/app/estampas_privadas/'.$estampa->imagem_url);
        }
        return 'http://cdn.shopify.com/s/files/1/0984/4522/products/ERROR-404-TSHIRT-NOT-FOUND-2_1024x1024.jpg';
    }


    public function admin_estampas()
    {
        $estampas = Estampas::paginate(15);
        return view('estampas.admin', compact('estampas'));
    }

    public function edit($id){
        $estampas = Estampas::FindOrFail($id);
        return view('estampas.edit', compact('estampas'));
    }
    public function update(EstampasPost $request, $id){
        $validated_data = $request->validated();
        $estampas = Estampas::findOrFail($id);
        $estampas->cliente_id = $validated_data['cliente_id'];
        $estampas->categoria_id = $validated_data['categoria_id'];
        $estampas->nome = $validated_data['nome'];
        $estampas->descricao = $validated_data['descricao'];
        $estampas->imagem_url = $validated_data['imagem_url'];
        $estampas->informacao_extra = $validated_data['informacao_extra'];
        $estampas->save();
        return redirect()->back()->with('alert-msg', 'Estampa alterado com sucesso')->with('alert-type', 'success');
    }

    public function destroy($id)
    {
       $estampas = Estampas::findOrFail($id);
       $estampas->delete();
       return redirect()->back()->with('alert-msg', 'Estampa apagado com sucesso')->with('alert-type', 'success');
    }
}
