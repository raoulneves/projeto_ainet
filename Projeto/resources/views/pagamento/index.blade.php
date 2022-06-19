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
            <div class="col-md-3 border-right">
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
                                        {{ $row['sessao'] }}
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
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center experience">
                            <h5>Dados Pessoais</h5>
                        </div>
                        <br>
                        <div class="col-md-12"><label class="labels">Nome <font color="red">*</font>
                            </label><input type="text" class="form-control" value=""></div>
                        <br>
                        <div class="col-md-12"><label class="labels">NIF</label><input type="text" class="form-control"
                                value=""></div><br>


                        <div class="form-group">
                            <label for="inputFoto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="inputFoto">
                            @error('foto')
                                <div class="small text-danger"></div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button">Guardar Perfil</button>
                        <a href="#" class="btn btn-secondary">Cancel</a>
                    </div>

                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-5 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h5>Dados de Pagamento</h5>
                    </div>
                    <br>
                    <p>Método de pagamento:</p>
                    <input type="radio" id="visa" name="fav_language" value="VISA">
                    <label for="visa">VISA</label><br>
                    <input type="radio" id="paypal" name="fav_language" value="PAYPAL">
                    <label for="paypal">PAYPAL</label><br>
                    <input type="radio" id="mbway" name="fav_language" value="MBWAY">
                    <label for="mbway">MBWAY</label>
                    <br><br>
                    <div class="col-md-12"><label class="labels">Referencia de Pagamento</label><input type="text"
                            class="form-control" value=""></div> <br>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
