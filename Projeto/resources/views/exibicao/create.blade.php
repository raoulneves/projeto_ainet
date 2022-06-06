@extends('layouts.admin')
@section('title', 'Novo Filme')
@section('content')

<form method="POST" action="{{route('admin.filmes.store')}}" class="form-group" enctype="multipart/form-data">
    @csrf
    @include('exibicao.partials.create-edit')
    <div class="form-group text-right">
            <button type="submit" class="btn btn-success" name="ok">Guardar</button>
            <a href="{{route('admin.filmes.create')}}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

@endsection
