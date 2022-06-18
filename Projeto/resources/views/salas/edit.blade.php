@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Sala</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.salas.update', ['sala' => $sala]) }}" class="form-group"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $sala->id }}">
                @include('salas.partials.create-edit')
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success" name="ok">Guardar</button>
                    <a href="{{ route('admin.salas.edit', ['sala' => $sala]) }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
