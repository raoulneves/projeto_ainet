@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>

                </tr>
            </thead>
            <tbody>
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nome}}</td>

                        <td>
                            <a href="{{route('admin.categorias.edit', ['Categorias' => $categoria->id])}}" class="btn btn-success btn-sm" role="button" aria-pressed="true" style="color: white;">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('admin.categorias.destroy',['Categorias'=> $categoria->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" style="color: white;" value="Remove"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        {{$categorias->links()}}
    </div>
</div>
@endsection
