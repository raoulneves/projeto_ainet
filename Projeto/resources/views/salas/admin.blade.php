@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="mb-3 col-3 col-sm">
            <h2>Salas de Cinema</h2>
        </div>
        <div class="mb-3 col-3 col-sm-2">
            <a href="{{route('admin.salas.create')}}" class="btn btn-success" role="button" aria-pressed="true">Nova Sala</a>
        </div>
    </div>

    <div class="row justify-content-center card shadow mb-4">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salas as $sala)
                    <tr>
                        <td>{{ $sala->nome }}</td>
                        <td>
                            <a href="{{route('admin.salas.edit', ['sala' => $sala])}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Alterar</a>
                        </td>
                        <td>
                            <form method="POST" action="{{route('admin.salas.destroy', $sala->id)}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Tem a certeza')" class="btn btn-danger btn-sm">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
