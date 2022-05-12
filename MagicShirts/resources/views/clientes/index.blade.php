@extends('layout')
@section('content')


<h2>Clientes</h2>

{{-- <div class="cursos-area">
    @foreach($clientes as $cliente)
    <div class="curso">
        <div class="curso-info-area">
            <div class="curso-info">
                <span class="curso-label">id</span>
                <span class="curso-info-desc">{{$cliente->id}}</span>
            </div>
            <div class="curso-info">
                <span class="curso-label">nif</span>
                <span class="curso-info-desc">{{$cliente->nif}}</span>
            </div>
            <div class="curso-info">
                <span class="curso-label">endereço</span>
                <span class="curso-info-desc">{{$cliente->endereco}}</span>
            </div>
        </div>
    </div>
    @endforeach
</div> --}}


<div class="cursos-area">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>nif</th>
                <th>Endereço</th>
                <th>Tipo de Pagamento</th>
                <th>Referencia de Pagamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <div class="curso">
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nif}}</td>
                <td>{{$cliente->endereco}}</td>
                <td>{{$cliente->tipo_pagamento}}</td>
                <td>{{$cliente->ref_pagamento}}</td>
            </tr>
        </div>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
