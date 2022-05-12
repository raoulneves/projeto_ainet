@extends('layout')
@section('content')

    <div class="container-fluid">

        <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Tamanho</th>
                        <th>Quantidade</th>
                    </thead>
                    <tbody>
                        @foreach ($carrinho as $row)
                            <tr>
                                <td>{{ $row['nome'] }}</td>
                                <td>{{ $row['cor'] }}</td>
                                <td>{{ $row['tamanho'] }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <form action="{{ route('carrinho.index_update', $row['id']) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="quantidade" value="-1">
                                                <input type="submit" value="-">
                                            </form>
                                        </div>
                                        <div class="col-4">
                                            {{ $row['qtd'] }}
                                        </div>
                                        <div class="col-4">
                                            <form action="{{ route('carrinho.index_update', $row['id']) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="quantidade" value="+1">
                                                <input type="submit" value="+">
                                            </form>
                                        </div>
                                    </div>

                                </td>


                                <td style="border: none;">

                                    <form action="{{ route('carrinho.index_des', $row['id']) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a class="nav-link" href="{{ route('pagamento.index') }}">
                    <div style="position: relative;text-align: right;">
                        <input type="submit" class="btn btn-success" value="Efetuar Pagamento">
                    </div>
                </a>
        </div>
    </div>



@endsection
