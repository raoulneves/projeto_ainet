@extends('layouts.app')
@section('content')
    <div class="container-fluid">


        <!-- Message spot -->
        @if (session()->has('alert-msg'))
            <div class="container">
                <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Successo!</strong> {{ session()->get('alert-msg') }}
                </div>
            </div>
        @endif
        <!-- Message spot -->

        <div class="container px-4 px-lg-5 my-5">
            <div class="table-responsive">

                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>Sessão</th>
                        <th>Titulo</th>
                        <th>Genero</th>
                        <th>Ano</th>
                        <th>Quantidade</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($carrinho as $row)
                            <tr>
                                <td>
                                    <div class="row">
                                        <!-- START  SESSOES -->
                                        <form class="needs-validation"
                                            action="{{ route('carrinho.sessao_update', $row['id']) }}" method="POST">
                                            @csrf
                                            <select class="form-select" id="sessionSel" name="sessionSel"
                                                onchange="this.form.submit();"required>
                                                <option selected disabled value="">Escolher uma sessão: </option>
                                                @foreach ($listaSessoes as $sessoes)
                                                    @if ($sessoes->filme_id == $row['id'])
                                                        <option value="{{ $sessoes->id }}"
                                                            {{ $sessoes->id == $row['sessao'] ? 'selected' : '' }}>
                                                            {{ $sessoes->data }} / {{ $sessoes->horario_inicio }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </form>

                                    </div>
                                    <!-- END    SESSOES -->
                                </td>
                                <td>{{ $row['titulo'] }}</td>
                                <td>{{ $row['genero'] }}</td>
                                <td>{{ $row['ano'] }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <form action="{{ route('carrinho.index_update', $row['id']) }}"
                                                method="POST">
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
                                            <form action="{{ route('carrinho.index_update', $row['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="quantidade" value="+1">
                                                <input type="submit" value="+">
                                            </form>
                                        </div>
                                    </div>

                                </td>
                                <td>
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

                <!-- Verificaocao se login esta feito -->
                @guest
                    <div style="position: relative;text-align: right;">
                        <input type="submit" class="btn btn-success" value="Efetuar Pagamento" disabled>
                    </div>
                @else
                    <a class="nav-link" href="{{ route('pagamento.index') }}">
                        <div style="position: relative;text-align: right;">
                            <input type="submit" class="btn btn-success" value="Efetuar Pagamento">
                        </div>
                    </a>
                @endguest


            </div>
        </div>
    </div>
@endsection
