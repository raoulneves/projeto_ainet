@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Preco_un_catalogo</th>
                    <th>Preco_un_proprio</th>
                    <th>Preco_un_catalogo_desconto</th>
                    <th>Preco_un_proprio_desconto</th>
                    <th>Quantidade_desconto</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($precos as $preco)
                    <tr>
                        <td>{{$preco->id}}</td>
                        <td>{{$preco->preco_un_catalogo}}</td>
                        <td>{{$preco->preco_un_proprio}}</td>
                        <td>{{$preco->preco_un_catalogo_desconto}}</td>
                        <td>{{$preco->preco_un_proprio_desconto}}</td>
                        <td>{{$preco->quantidade_desconto}}</td>
                        <td>
                            <a href="{{route('admin.precos.edit', ['Precos' => $preco->id])}}" class="btn btn-success btn-sm" role="button" aria-pressed="true" style="color: white;">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('admin.precos.destroy',['Precos'=> $preco->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" style="color: white;" value="Remove"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        {{$precos->links()}}
    </div>
</div>
@endsection
