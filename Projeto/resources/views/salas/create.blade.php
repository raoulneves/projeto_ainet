@extends('layouts.admin')
@section('title', 'Nova Sala')
@section('content')

<form method="POST" action="{{route('admin.salas.store')}}" class="form-group" enctype="multipart/form-data">
    @csrf
    @include('salas.partials.create-edit')
    <div class="form-group text-right">
            <button type="submit" class="btn btn-success" name="ok">Guardar</button>
            <a href="{{route('admin.salas.create')}}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

@endsection
