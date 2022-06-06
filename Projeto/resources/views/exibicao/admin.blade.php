@extends('layouts.admin')
@section('title', 'Filmes')
@section('content')

    <div class="container">
        <div class="row mb-3">
            <div class="col-3">
                @can('create', App\Models\Filme::class)
                    <a href="{{route('admin.filmes.create')}}" class="btn btn-success" role="button" aria-pressed="true">Novo Filme</a>
                @endcan
            </div>
        </div>
        <div class="row justify-content-center">

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
                                @can('view', $filme)
                                <a href="{{route('admin.filmes.edit', ['filme' => $filme])}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Alterar</a>
                                @endcan
                        </td>
                        <td>
                            @can('delete', $aluno)
                                <form action="{{route('admin.filmes.destroy', ['filme' => $filme])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="btn btn-danger btn-sm" value="Apagar">
                                </form>
                            @endcan
                        </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$filmes->links()}}
        </div>
    </div>

@endsection
