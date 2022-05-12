<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function admin_index()
    {
        $users = User::paginate(15);
        return view('users.admin', compact('users'));
    }

    public function edit($id){
        $user = User::FindOrFail($id);
        return view('users.edit', compact('user'));
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
}


