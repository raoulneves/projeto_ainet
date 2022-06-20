@extends('layouts.admin')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar Utilizador</h6>
    </div>
    <div class="card-body">
        <form action="{{route('admin.users.update', ['Users'=>$user->id])}}" method="POST">
            @csrf
            @method('PATCH')


            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}"/>
                @error('name')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}"/>
                @error('email')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <select class="form-control" name="tipo" id="tipo">
                    <option value="A" @if($user->tipo == 'A') selected @endif>Administrador</option>
                    <option value="F" @if($user->tipo == 'F') selected @endif>Funcionario</option>
                    <option value="C" @if($user->tipo == 'C') selected @endif>Cliente</option>
                </select>
                @error('tipo')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Bloqueado</label>
                <select class="form-control" name="bloqueado" id="bloqueado">
                    <option value="1" @if($user->bloqueado == '1') selected @endif>Bloqueado</option>
                    <option value="0" @if($user->bloqueado == '0') selected @endif>Desbloqueado</option>
                </select>
                @error('bloqueado')
                    <div class="text-danger small">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{route('admin.users')}}" class="btn btn-secondary">cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
