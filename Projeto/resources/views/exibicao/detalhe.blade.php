@extends('layouts.app')

@section('content')

    <body>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0"
                            src="{{ Storage::url('cartazes/' . $filme->cartaz_url) }}" alt="..." /></div>
                    <div class="col-md-8">
                        <form action="{{ route('carrinho.index_post') }}" method="POST">
                            @csrf
                            <input hidden name="filme_id" id="filme_id" value="{{ $filme->id }}">
                            <h1 class="display-5 fw-bolder">{{ $filme->titulo }}</h1>
                            <div class="fs-5 mb-2">
                                <span>{{ $filme->genero_code }}</span>
                                /
                                <span>{{ $filme->ano }}</span>
                            </div>
                            <!-- START  Sessoes filme -->
                            <div class="fs-5 mb-2 table-responsive" style="max-height:150px">
                                <table class="table table-condensed">
                                    <tr>
                                        <th>Data</th>
                                        <th>Hora Inicio</th>
                                        <th>Sala</th>
                                        <th>Vagas</th>
                                    </tr>
                                    @foreach ($sessoes as $sessao)
                                        <tr>
                                            <td>{{ $sessao->data }}</td>
                                            <td>{{ $sessao->horario_inicio }}</td>
                                            <td>{{ $sessao->sala_id }}</td>
                                            <td>{{ $sessao->seats_remaining }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- END    Sessoes filme -->
                            <p class="lead">{{ $filme->sumario }}</p>
                            <p class="lead"><b>Trailer: </b><a
                                    href="{{ $filme->trailer_url }}">{{ $filme->trailer_url }}</a></p>
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                                    style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Adicionar ao carrinho
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section teste branch ?-->

        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Outros filmes</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    @foreach ($filmesRelacionados as $filmes)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <a href="{{ route('exibicao.detalhe', $filmes->id) }}">
                                    <!-- Product image-->
                                    <img class="card-img-top"
                                        src="{{ Storage::url('cartazes/' . $filmes->cartaz_url) }}" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $filmes->titulo }}</h5>
                                            <!-- Product price-->
                                            {{ $filmes->genero_code }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
            </div>
        </footer>
    </body>

    </html>
@endsection
