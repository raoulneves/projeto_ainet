@extends('layout')
@section('content')
<h1> categorias </h1>


<div class="cursos-area">
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
        <div class="curso">
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->nome}}</td>
        </tr>
    </div>
        @endforeach
        </tbody>
    </table>
</div>


@endsection
