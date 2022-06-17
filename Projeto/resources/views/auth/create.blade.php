@extends('layouts.admin')
@section('title', 'Criar Utilizador')
@section('content')
    <form method="POST" action="{{route('admin.users.store')}}" class="form-group">
        @csrf
        @include('auth.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Guardar</button>
                <a href="{{route('admin.users.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
