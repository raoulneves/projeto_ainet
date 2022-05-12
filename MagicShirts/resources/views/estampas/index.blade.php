@extends('layout')
@section('content')
    <h1> Catálogo </h1>

    <head>
        <style>
            .popup {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                width: 500px;
                height: 380px;
                padding: 15px;
                border: solid 1px #4c4d4f;
                background: #ffff;
                display: none;
            }

            .radiob {
                width: 216px;
                height: 180px;
                display: inline-block;
            }

            .estampa {
                display: inline-block;
                margin-right: 40px;
                width: 33%;

            }

            .estampa-imagem img {
                height: 300px;
                width: 282px;
            }

            .estampa-info-area {}

        </style>
        <script type="text/javascript">
            function abrir() {
                document.getElementById('popup').style.display = 'block';
            }

            function fechar() {
                document.getElementById('popup').style.display = 'none';
            }

        </script>
    </head>

    <div class="row">
        <div class="col-12 col-lg-4">
            <form class="disc-search" action="#" method="GET">
                <div class="search-item">
                    <label for="idDisc">Disc:</label>
                    <select name="categoria" id="idDisc">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ $categoria->id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="search-item">
                    <button type="submit" class="bt" id="btn-filter">Filtrar</button>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-4">
            <form class="disc-search" action="{{ route('estampas.index_filter') }}" method="GET">
                <div class="search-item">
                    <label for="idDisc">Nome / Descrição</label>
                    <input type="text" id="key" name="key">
                </div>
                <div class="search-item">
                    <button type="submit" class="bt" id="btn-filter">Filtrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($estampas as $estampa)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-5">
                    <div class="product__item">
                        <div class="estampa-imagem">
                            <img src="{{ asset('storage/estampas/' . $estampa->imagem_url) }}" alt="Imagem do estampa">
                        </div>
                        <div class="estampa-info-area">
                            <div class="estampa-info">
                                <span class="estampa-label">Nome: </span>
                                <span class="estampa-info-desc">{{ $estampa->nome }}</span>
                            </div>
                            <div class="estampa-info">
                                <span class="estampa-label">Descrição: </span>
                                <span class="estampa-info-desc">{{ $estampa->descricao }}</span>
                            </div>
                            <div class="estampa-info">
                                <span class="estampa-label">Categoria: </span>
                                <span class="estampa-info-desc">{{ $estampa->categoria_id }}</span>
                            </div>
                            <div>
                                <input hidden id="estampa_id" name="estampa_id" value="{{ $estampa->id }}">
                                <div id="popup" class="popup">
                                    <div class="radiob">
                                        <p><b>A cor da t-shirt:</b></p>
                                        <select name="cor" id="cor">
                                            <option value="Vermelho">Vermelho</option>
                                            <option value="Verde">Verde</option>
                                            <option value="Azul">Azul</option>
                                            <option value="Amarelo">Amarelo</option>
                                        </select>
                                    </div>

                                    <div class="radiob">
                                        <p><b>Tamanho da t-shirt: </b></p>
                                        <input type="radio" name="tamanho">
                                        <label for="male">M</label><br>
                                        <input type="radio" name="tamanho">
                                        <label for="male">M</label><br>
                                        <input type="radio" name="tamanho">
                                        <label for="male">M</label><br>
                                        <input type="radio" name="tamanho">
                                        <label for="male">M</label><br>
                                    </div>

                                    <b>Número de t-shirt: </b>
                                    <input type="text" name="Nome" size="40" />



                                    <button>Adicionar ao Carrinho</button>
                                    <a href="javascript: fechar();"><button>Cancelar</button></a>
                                </div>
                                <a style="text-decoration: none;" href="{{ route('carrinho.index_show', $estampa->id) }}"><button class="btn btn-success btn-block" type="submit">Adicionar
                                        ao Carrinho</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 d-flex justify-content-center pt-4" class="li: { list-style: none; }">
                {{ $estampas->links() }}
            </div>
        </div>
    </div>


@endsection
