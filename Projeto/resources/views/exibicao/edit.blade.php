@extends('layouts.admin')
@section('title', 'Editar Filme')
@section('content')
    <form method="POST" action="{{route('admin.filmes.update', ['filme' => $filme]) }}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$filme->id}}">
        @include('exibicao.partials.create-edit')
        <div class="form-group text-right">
            <button type="submit" class="btn btn-success" name="ok">Guardar</button>
            <a href="{{route('admin.filmes.edit', ['filme' => $filme]) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

@endsection
