@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row">
            <div class="mb-3 col-3 col-sm">
                <h2>Filmes</h2>
            </div>
            <div class="mb-3 col-3 col-sm-2">
                <a href="{{route('admin.filmes.create')}}" class="btn btn-success" role="button" aria-pressed="true">Novo Filme</a>
            </div>
        </div>

        <div class="row justify-content-center card shadow mb-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Titulo</th>
                        <th>Genero</th>
                        <th>Ano</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filmes as $filme)
                        <tr>
                            <td>
                                <img src="{{ $filme->cartaz_url ? asset('storage/cartazes/' . $filme->cartaz_url) : asset('#') }}"
                                    alt="Cartaz do Filme" class="img-profile rounded-circle" style="width:40px;height:40px">
                            </td>
                            <td>{{ $filme->titulo }}</td>
                            <td>{{ $filme->genero_code }}</td>
                            <td>{{ $filme->ano }}</td>
                            <td>
                                <a href="{{route('admin.filmes.edit', ['filme' => $filme])}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Alterar</a>
                        </td>
                        <td>

                                <form action="{{route('admin.filmes.destroy', ['filme' => $filme->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="btn btn-danger btn-sm" value="Apagar">
                                </form>

                        </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$filmes->links()}}
    </div>

@endsection
