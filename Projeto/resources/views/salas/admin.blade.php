@extends('layouts.admin')
@section('title', 'Salas de Cinema')
@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col-3">
            @can('create', App\Models\Sala::class)
                <a href="{{route('admin.salas.create')}}" class="btn btn-success" role="button" aria-pressed="true">Nova Sala</a>
            @endcan
        </div>
    </div>
    <div class="row justify-content-center">

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

                                <form action="{{route('admin.salas.destroy', ['sala' => $sala])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="btn btn-danger btn-sm" value="Apagar">
                                </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$salas->links()}}
    </div>
</div>

@endsection
