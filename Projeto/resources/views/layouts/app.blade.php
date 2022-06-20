<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CineMagic') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
     <script type="text/javascript" src="asset('js/profile.js')"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CineMagic') }}
                </a>
                <!--
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>
                -->
                <!--div class="collapse navbar-collapse" id="navbarSupportedContent"-->

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                             @if (Route::has('register'))
                                 <li class="nav-item">
                                     <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                 </li>
                             @endif
                             <li class="nav-item">
                                 <a class="nav-link fas fa-shopping-cart" href="{{ route('carrinho.index') }}"></a>
                             </li>
                         @else
                             <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     {{ Auth::user()->name }}
                                     <img class="img-profile rounded-circle" style="width: auto; height: 21px;" src="{{ Auth::user()->foto_url ? Storage::url('fotos/' . Auth::user()->foto_url) : asset('img/default_img.png') }}">
                                 </a>

                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->tipo == 'C')
                                        <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('alterarPassword') }}">Alterar a password</a>

                                    @if(Auth::user()->tipo != 'C')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Administrador</a>
                                    @endif
                                    <br>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                         class="d-none">
                                         @csrf
                                     </form>
                                 </div>
                             </li>
                             <div class="container d-flex align-items-center">
                             <li class="nav-item">
                                 <a class="nav-link fas fa-shopping-cart" href="{{ route('carrinho.index') }}"></a>
                             </li>
                            </div>
                         @endguest
                     </ul>
                 </div>
             </div>
         </nav>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- PERFIL -->
                                <li><a class="dropdown-item" href="{{ route('perfil') }}">
                                        {{ __('Perfil') }}
                                    </a>
                                </li>

                                <!-- LOGOUT -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>

                        <div class="container d-flex align-items-center">
                            <li class="nav-item">
                                <a class="nav-link fas fa-shopping-cart" href="{{ route('carrinho.index') }}"></a>
                            </li>
                        </div>

                    @endguest
                </ul>
                <!--/div-->
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
