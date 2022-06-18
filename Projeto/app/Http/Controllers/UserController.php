<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserUpdateRequest;
use App\Http\Requests\UserPost;
use App\Models\Clientes;
use App\Models\User;
use Auth;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    public function perfil(){
        //obter id do utilizador logado
        $user = Auth::user()->id;
        $cliente = Clientes::where('id', '=', $user)->get();
        return view('perfil.index')->withCliente($cliente);
    }

    public function admin_utilizadores(){
        $users = User::paginate(15);
        return view('auth.admin', compact('users'));
    }

    public function edit($id)
    {
        $user = User::FindOrFail($id);
        return view('auth.edit', compact('user'));
    }

    public function update(PostUserUpdateRequest $request, $id){
        $validated_data = $request->validated();
        $user = User::findOrFail($id);
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->tipo = $validated_data['tipo'];
        $user->bloqueado = $validated_data['bloqueado'];
        $user->save();
        return redirect()->back()->with('alert-msg', 'Utilizador alterado com sucesso')->with('alert-type', 'success');
    }

    public function destroy($id)
    {
       $user = User::findOrFail($id);
       $user->delete();
       return redirect()->back()->with('alert-msg', 'Utilizador apagado com sucesso')->with('alert-type', 'success');
    }

    public function create()
    {
        $users = new User();
        return view('auth.create', compact('users'));
    }

    public function store(UserPost $request)
    {
        $newUser = User::create($request->validated());
        return redirect()->route('admin.auth')
            ->with('alert-msg', 'Conta "' . $newUser->name . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }
}
