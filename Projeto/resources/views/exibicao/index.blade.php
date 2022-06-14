<style>
    #img {
        display: inline-block;
        position: relative;
    }

    #hover:hover {
        -webkit-filter: blur(2px);
        filter: blur(2px);
    }

    #img img {
        position: relative;
        max-width: 100%;
        max-height: 50%;
        width: auto;
        height: auto;
        display: inline-block;
    }



    #img h1 {
        position: absolute;
        text-align: center;
        color: white;
        text-shadow: 0px 0px 5px black;
        left: 33%;
        top: 45%;
    }

</style>

@extends('layouts.app')

@section('content')
    <!-- Header-->
    <header>
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <a href="{{ route('filme') }}" id="img">
                    <img src="{{ Storage::url('header/cinema.png') }}">
                    <h1 class="display-4 fw-bolder">Filmes em Exibição</h1>
                </a>
            </div>
        </div>
    </header>


    <!-- Container for Genre filter and Search -->
    <div class="container px-4 px-lg-5 mt-3">
        <div class="d-flex bd-highlight align-items-center justify-content-between">
            <div class="p-2 bd-highlight">
                <!-- Select genre -->
                <form class="d-flex" action="{{ route('filme') }}" method="GET">
                    <select class="form-select" aria-label="Default select example" id="keygen" name="keygen"
                        onchange="this.form.submit();">
                        <option disabled selected>Género:</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->code }}" {{ $genre->code == $selectedgenre ? 'selected' : '' }}>
                                {{ $genre->nome }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <!-- Search -->
            <div class="p-2 bd-highlight">
                <form class="d-flex" action="{{ route('index_filter') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Nome do filme..." aria-label="Search"
                        id="key" name="key">
                    <button class="btn btn-outline-success" type="submit">Procurar</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Section-->
    <section class="py-1">
        <div class="container px-2 px-lg-5 mt-3">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($filmes as $filme)
                    <div class="col mb-5">
                        <div class="card h-100" id="filme">
                            <a href="{{ route('exibicao.detalhe', $filme->id) }}">
                                <!-- Product image-->
                                <img class="card-img-top" id="hover"
                                    src="{{ Storage::url('cartazes/' . $filme->cartaz_url) }}" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $filme->titulo }}</h5>
                                        <!-- Product price-->
                                        {{ $filme->genero_code }}
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
@endsection
