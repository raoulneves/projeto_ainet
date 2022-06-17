<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserUpdateRequest;
use App\Http\Requests\UserPost;
use App\Models\Clientes;
use App\Models\User;
use Auth;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;
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

    public function alterarPassword(){
        //$user = Auth::user()->id;
        return view('perfil.editPassword');
    }


    /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function updatePassword(Request $request){
        /*$request->validate([
            'old_password'=> 'required|min:6|max:100',
            'new_password'=> 'required|min:6|max:100',
            'confirm_password' => 'required|same:new_password'
        ]);


        $current_user=auth()->user();
        if(Hash::check($request->old_password, $current_user->password)){
            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            return redirect()->back()->with('success', 'Password alterada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Password antiga está errada');
        }*/

        if(!(Hash::check($request->get('current_password'), Auth::user()->password))){
            return back()->with('error', 'Sua senha atual não corresponde à que você forneceu');
        }
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
        $users = User::all();
        return view('auth.admin', compact('users'));
    }
}
