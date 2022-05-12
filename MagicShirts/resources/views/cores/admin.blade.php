@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cores as $cor)
                    <tr>
                        <td>{{ $cor->codigo }}</td>
                        <td>{{ $cor->nome }}</td>
                        <td>
                            <a href="{{ route('admin.cores.edit', ['Cores' => $cor->codigo]) }}"
                                class="btn btn-success btn-sm" role="button" aria-pressed="true"
                                style="color: white;">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.cores.destroy', ['Cores' => $cor->codigo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" style="color: white;"
                                    value="Remove" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        {{ $cores->links() }}
    </div>
</div>
@endsection
