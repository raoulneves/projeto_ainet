@extends('layout')
<style>
    .box {
  float: left;
  height: 20px;
  width: 20px;
  margin-bottom: 15px;
  border: 1px solid black;
  clear: both;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Encomenda_id</th>
                    <th>Estampa_id</th>
                    <th>Cor_codigo</th>
                    <th>Tamanho</th>
                    <th>Quantidade</th>
                    <th>Preco_un</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($tshirts as $tshirt)
                    <tr>
                        <td>{{$tshirt->id}}</td>
                        <td>{{$tshirt->encomenda_id}}</td>
                        <td>{{$tshirt->estampa_id}}</td>
                        <td><div class="box mr-2" style="background-color: #{{$tshirt->cor_codigo}}"></div> {{$tshirt->cor_codigo}}</td>
                        <td>{{$tshirt->tamanho}}</td>
                        <td>{{$tshirt->quantidade}}</td>
                        <td>{{$tshirt->preco_un}}</td>
                        <td>{{$tshirt->subtotal}}</td>
                        <td>
                            <a href="{{route('admin.tshirts.edit', ['Tshirts' => $tshirt->id])}}" class="btn btn-success btn-sm" role="button" aria-pressed="true" style="color: white;">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('admin.tshirts.destroy',['Tshirts'=> $tshirt->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" style="color: white;" value="Remove"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        {{$tshirts->links()}}
    </div>
</div>
@endsection
