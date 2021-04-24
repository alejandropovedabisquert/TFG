<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Lilith's Garden</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top header">
            <a class="navbar-brand mx-5" href="{{ url('/') }}">
                {{ 'Liliths Garden' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <nav class="navbar m-auto">
                    <div class="container-fluid">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jueguetes</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="{{ route('categorias.show', 'vibrador') }}">{{__('Vibradores')}}</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cosmeticos</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Esenciales</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav  mx-5">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('usuarios.show', Auth::user()) }}">{{ __('Perfil') }}</a>

                                @if (Auth::user()->role == 1)
                                    <a class="dropdown-item"
                                        href="{{ route('administrador.show') }}">{{ __('Administracion') }}</a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <nav class="navbar-expand-lg navbar-light shadow-sm sticky-top sub-header">
            <p class="text-center mb-0"><b>{{'Eslogan de la empresa'}}</b></p>
        </nav>

        <main>
            @yield('content')
        </main>
        <!-- Footer -->
        <br><br><br><br><br><br>
        <footer class="footer">
            <img src="{{URL::asset('storage/uploads/logo/asus-logo-0.png')}}" alt="" width="300px">
            <p class="text-center mb-0">
                {{'RRSS'}} 
            <br>
                <a href="">{{'Quienes somos'}}</a> | <a href="">{{'Politica de privacidad'}}</a> | <a href="">{{'Aviso legal'}}</a> | <a href="">{{'Contacto'}}</a>
            <br>
                {{'Copyright'}}&copy; {{ 'Liliths Garden' }} {{date('Y')}}. {{'Todos los derechos reservados.'}} 
            <br>
                {{'Todos los precios de productos, servicios o gastos de envío mostrados en esta página incluyen el IVA correspondiente'}}
            </p>
        </footer>
    </div>

</html>
