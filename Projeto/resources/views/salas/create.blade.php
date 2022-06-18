@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nova Sala</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.salas.store') }}" class="form-group" enctype="multipart/form-data">
                @csrf
                @include('salas.partials.create-edit')
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success" name="ok">Guardar</button>
                    <a href="{{ route('admin.salas.create') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
