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
                <a href="#filme" id="img">
                    <img src="{{ asset('img/cinema.png') }}">
                    <h1 class="display-4 fw-bolder">Filmes em Exibição</h1>
                </a>
            </div>
        </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    @endsection
