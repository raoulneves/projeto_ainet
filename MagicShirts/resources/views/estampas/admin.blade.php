@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Categoria</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Imagem</th>
                    <th>Info_Extra</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($estampas as $estampa)
                    <tr>
                        <td>{{$estampa->id}}</td>
                        <td>{{$estampa->cliente_id}}</td>
                        <td>{{$estampa->categoria_id}}</td>
                        <td>{{$estampa->nome}}</td>
                        <td>{{$estampa->descricao}}</td>

                        <td>
                            @if ($estampa->cliente_id)
                                <img src="{{ route('estampas.privada', $estampa) }}" class="estampa_preview" style="width: 44px;">
                            @else
                                <img src="{{ asset('storage/estampas/' . $estampa->imagem_url) }}" class="estampa_preview" style="width: 44px;">
                            @endif
                        </td>

                        <td>{{$estampa->informacao_extra}}</td>
                        <td>
                            <a href="{{route('admin.estampas.edit', ['Estampas' => $estampa->id])}}" class="btn btn-success btn-sm" role="button" aria-pressed="true" style="color: white;">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('estampas.destroy',['Estampas'=> $estampa->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" style="color: white;" value="Remove"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        {{$estampas->links()}}
    </div>
</div>
@endsection
