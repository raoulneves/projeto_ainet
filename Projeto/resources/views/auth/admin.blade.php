@extends('layouts.admin')
@section('title', 'Utilizadores')
@section('content')


    <div class="container">
        <div class="row mb-3 col-3">
            <a href="{{route('admin.users.create')}}" class="btn btn-success" role="button" aria-pressed="true">Novo Utilizador</a>
        </div>



        <div class="row justify-content-center card shadow mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Bloqueado</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->foto_url ? Storage::url('fotos/' . $user->foto_url) : asset('img/default_img.png') }}"
                                    alt="Users" class="img-profile rounded-circle" style="width:40px;height:40px">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->tipo }}</td>
                            @if ($user->bloqueado == '0')
                                <td>Não</td>
                            @else
                                <td>Sim</td>
                            @endif
                            <td>
                                <a href="{{route('admin.users.edit', ['Users' => $user->id])}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Alterar</a>
                        </td>
                        <td>
                                <form action="{{route('admin.users.destroy',['Users'=> $user->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="btn btn-danger btn-sm" value="Remove"/>
                                </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
