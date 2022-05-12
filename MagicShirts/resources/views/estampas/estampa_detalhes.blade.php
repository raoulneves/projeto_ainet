@extends('layout')
@section('content')
    <h1> Estampa </h1>

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

                width: 100%;
            }

            .estampa-info-area {}

            .tshirt {
                position: relative;
                top: 0;
                left: 0;
            }

            .estampa_preview {
                position: absolute;
                top: 108px;
                left: 178px;
                width: 33%;
            }

        </style>
    </head>

    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="estampa-imagem">
                @if ($estampa->cliente_id)
                    <img src="{{ route('estampas.privada', $estampa) }}">
                @else
                    <img src="{{ asset('storage/estampas/' . $estampa->imagem_url) }}">
                @endif
            </div>

        </div>
        <div class="col-12 col-lg-3">
            <div class="estampa-info-area">
                <div class="estampa-info">
                    <span class="estampa-label">Nome: </span>
                    <span class="estampa-info-desc"><strong>{{ $estampa->nome }}</strong></span>
                </div>
                <div class="estampa-info">
                    <span class="estampa-label">Descrição: </span>
                    <span class="estampa-info-desc"><strong>{{ $estampa->descricao }}</strong></span>
                </div>
                <div class="estampa-info">
                    <span class="estampa-label">Categoria: </span>
                    <span class="estampa-info-desc"><strong>{{ $estampa->categoria_id }}</strong></span>
                </div>
                <div>
                </div>

            </div>
            <form action="{{ route('carrinho.index_post') }}" method="POST">
                @csrf
                <input hidden name="estampa_id" id="estampa_id" value="{{ $estampa->id }}">
                <select name="cor" id="cor" class="custom-select mb-3 mt-3">
                    <option value="Branco">Branco</option>
                    <option value="BrancoGelo">Branco Gelo</option>
                    <option value="BrancoAcinzentado">Branco Acinzentado</option>
                    <option value="BrancoLeite">Branco Leite</option>
                    <option value="BrancoPuro">Branco Puro</option>
                    <option value="BrancoEsverdeado">Branco Esverdeado</option>
                    <option value="Cinzento">Cinzento</option>
                    <option value="CinzentoEscuro">Cinzento Escuro</option>
                    <option value="Vermelho">Vermelho</option>
                    <option value="Azul">Azul</option>
                    <option value="AzulCeleste">Azul Celeste</option>
                    <option value="AzulTurquesa">Azul Turquesa</option>
                    <option value="AzulIndio">Azul Índio</option>
                    <option value="AzulPetroleo">Azul Petróleo</option>
                    <option value="Amarelo">Amarelo</option>
                    <option value="AmareloTorrado">Amarelo Torrado</option>
                    <option value="CorLaranja">Cor de Laranja</option>
                    <option value="CorLaranjaEscuro">Cor de Laranja Escuro</option>
                    <option value="CorRosa">Cor de Rosa</option>
                    <option value="CorRosaClaro">Cor de Rosa Claro</option>
                    <option value="CorPele">Cor Pele</option>
                    <option value="Creme">Creme</option>
                    <option value="Roxo">Roxo</option>
                    <option value="VerdeClaro">Verde Claro</option>
                    <option value="Verde">Verde</option>
                    <option value="VerdeEscuro">Verde Escuro</option>
                    <option value="Preto">Preto</option>
                    <option value="CastanhoEscuro">Castanho Escuro</option>
                    <option value="CastanhoClaro">Castanho Claro</option>
                </select>
                <select name="tamanho" id="tamanho" class="custom-select mb-3">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
                <input type="button" onclick="ver_tshirt()" class="btn btn-success btn-block" value="Preview"></button>
                <button type="submit" class="btn btn-success btn-block mb-3">Adicionar ao Carrinho</button>
            </form>
        </div>
        <div class="col-12 col-lg-3"  style="display: none" id="div_hidden">
            <div style="position: relative; left: 0; top: 0;">
                <img src="{{ asset('storage/tshirt_base/ac283b.jpg') }}" id="tshirt_image" class="tshirt">
                @if ($estampa->cliente_id)
                    <img src="{{ route('estampas.privada', $estampa) }}" class="estampa_preview">
                @else
                    <img src="{{ asset('storage/estampas/' . $estampa->imagem_url) }}" class="estampa_preview">
                @endif

            </div>
        </div>
    </div>

    <script>
        function ver_tshirt() {
            let div_hidden = document.getElementById('div_hidden');
            div_hidden.style.display = "";
            let tshirt = document.getElementById('cor').value;
            let tshirt_image = document.getElementById('tshirt_image');
            switch (tshirt) {
                case 'Branco':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/fcfbff.jpg') }}'
                    break;
                case 'BrancoGelo':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/fafafa.jpg') }}'
                    break;
                case 'BrancoAcinzentado':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/f0eff3.jpg') }}'
                    break;
                case 'BrancoLeite':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/e7e0ee.jpg') }}'
                    break;
                case 'BrancoPuro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/fcfbff.jpg') }}'
                    break;
                case 'BrancoEsverdeado':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/cfdcd8.jpg') }}'
                    break;
                case 'Cinzento':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/c7c6cf.jpg') }}'
                    break;
                case 'CinzentoEscuro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/7f7277.jpg') }}'
                    break;
                case 'Vermelho':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/ac283b.jpg') }}'
                    break;
                case 'Azul':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/284d9d.jpg') }}'
                    break;
                case 'AzulCeleste':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/00a2f2.jpg') }}'
                    break;
                case 'AzulTurquesa':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/4bd7ef.jpg') }}'
                    break;
                case 'AzulIndio':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/201f30.jpg') }}'
                    break;
                case 'AzulPetroleo':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/282c48.jpg') }}'
                    break;
                case 'Amarelo':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/f3f46b.jpg') }}'
                    break;
                case 'AmareloTorrado':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/ecdb2e.jpg') }}'
                    break;
                case 'CorLaranja':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/f9b014.jpg') }}'
                    break;
                case 'CorLaranjaEscuro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/fd890f.jpg') }}'
                    break;
                case 'CorRosa':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/fd4083.jpg') }}'
                    break;
                case 'CorRosaClaro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/fcabd2.jpg') }}'
                    break;
                case 'CorPele':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/fef7db.jpg') }}'
                    break;
                case 'Creme':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/ffd2c3.jpg') }}'
                    break;
                case 'Roxo':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/73336a.jpg') }}'
                    break;
                case 'VerdeClaro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/bceb97.jpg') }}'
                    break;
                case 'Verde':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/1fba8f.jpg') }}'
                    break;
                case 'VerdeEscuro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/10534e.jpg') }}'
                    break;
                case 'Preto':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/1e1e21.jpg') }}'
                    break;
                case 'CastanhoEscuro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/49302c.jpg') }}'
                    break;
                case 'CastanhoClaro':
                    tshirt_image.src = '{{ asset('storage/tshirt_base/684f2e.jpg') }}'
                    break;
            }

        }

    </script>
@endsection
