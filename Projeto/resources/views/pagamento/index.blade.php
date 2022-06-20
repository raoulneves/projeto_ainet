<style>
    body {
        background: rgb(99, 39, 120)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>


@extends('layouts.app')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <!-- Lista carrinho -->
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Sessão</th>
                            <th>Titulo</th>
                            <th>Quantidade</th>
                        </thead>
                        <tbody>
                            @foreach ($carrinho as $row)
                                <tr>
                                    <td>
                                        @foreach ($sessions as $sessao)
                                            @if ($sessao->id == $row['sessao'])
                                                {{ $sessao->data }} / {{ $sessao->horario_inicio }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $row['titulo'] }}</td>
                                    <td>
                                        {{ $row['qtd'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-5 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h5>Método de Pagamento</h5>
                    </div>
                    <br>
                    <p>Escolher opção:</p>
                    <!-- Select genre -->
                    <form class="d-flex" action="{{ route('pagamento.index') }}" method="GET">
                        @csrf
                        <select class="form-select" aria-label="Default select example" id="payment_option"
                            name="payment_option" onchange="this.form.submit();">
                            <option disabled selected>Selecionar:</option>
                            <option value="VISA" @if ($metPagamento == 1) {{ 'selected' }} @endif>VISA
                            </option>
                            <option value="PAYPAL" @if ($metPagamento == 2) {{ 'selected' }} @endif>PAYPAL
                            </option>
                            <option value="MBWAY" @if ($metPagamento == 3) {{ 'selected' }} @endif>MBWAY
                            </option>
                        </select>
                    </form>

                    <br><br>
                    @if ($metPagamento == 1)
                        <div class="col-md-12"><label class="labels">Numero cartão</label>
                            <input type="text" class="form-control" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">CVC</label>
                            <input type="text" class="form-control" value="">
                        </div>
                    @endif
                    @if ($metPagamento == 2)
                        <div class="col-md-12">
                            <label class="labels">E-Mail Paypal</label>
                            <input type="text" class="form-control" value="">
                        </div>
                    @endif
                    @if ($metPagamento == 3)
                        <div class="col-md-12">
                            <label class="labels">Nº Télemovel MBWay</label>
                            <input type="text" class="form-control" value="">
                        </div>
                    @endif
                    <br>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button">Pagar</button>
                        <!--a href="#" class="btn btn-secondary">Cancel</!--a -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
