@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Nif</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        @if($user->cliente != null)
                            <td>{{$user->cliente->nif}}</td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <a href="{{route('admin.users.edit', ['Users' => $user->id])}}" class="btn btn-success btn-sm" role="button" aria-pressed="true" style="color: white;">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('admin.users.destroy',['Users'=> $user->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" style="color: white;" value="Remove"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        {{$users->links()}}
    </div>
</div>
@endsection
