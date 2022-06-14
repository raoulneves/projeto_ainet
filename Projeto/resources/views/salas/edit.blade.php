@extends('layouts.admin')
@section('title', 'Editar Sala')
@section('content')
    <form method="POST" action="{{route('admin.salas.update', ['sala' => $sala]) }}" class="form-group" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$sala->id}}">
        @include('salas.partials.create-edit')
        <div class="form-group text-right">
            @can('update', $sala)
                <button type="submit" class="btn btn-success" name="ok">Guardar</button>
            @endcan
            <a href="{{route('admin.salas.edit', ['sala' => $sala]) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

@endsection
