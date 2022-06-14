@extends('layouts.admin')
@section('title', 'Salas de Cinema')
@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col-3">
                <a href="{{route('admin.salas.create')}}" class="btn btn-success" role="button" aria-pressed="true">Nova Sala</a>
        </div>
    </div>
    <div class="row justify-content-center">
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
                            <form method="POST" action="{{route('admin.salas.delete', $sala->id)}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Tem a certeza')" class="btn btn-danger btn-sm">Delete</button>
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
