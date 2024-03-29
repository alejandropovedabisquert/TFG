<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('storage/uploads/logo/icono-liliths-garden.png') }}">
    <title>@yield('title') | Lilith's Garden</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">


</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top header">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ URL::asset('storage/uploads/logo/logo-header-liliths-garden.png') }}" alt=""
                    width="300vh">
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
                            @foreach ($categorias as $categoria)
                            <li class="nav-item dropdown menu-header">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ $categoria->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    @foreach ($categoria->subcategorias as $subcategoria)
                                    <a class="dropdown-item"
                                    href="{{ route('subcategorias.show', $subcategoria->slug) }}">{{ $subcategoria->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
        
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav  mx-5">
                    {{-- Buscador --}}
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <a class="nav-link" class="btn" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-search icono-nav"></i>
                        </a>
        
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person-circle icono-nav"></i>
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Route::has('login'))
                                    <a class="dropdown-item"
                                        href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                @endif
        
                                @if (Route::has('register'))
                                    <a class="dropdown-item"
                                        href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                @endif
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person-circle icono-nav"></i>
                                {{-- {{ Auth::user()->name }} --}}
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('usuarios.show', Auth::user()) }}">{{ __('Perfil') }}</a>
        
                                <a class="dropdown-item" href="{{ route('pedidos.pedido') }}">{{ __('Pedidos') }}</a>
        
                                @if (Auth::user()->role == 1)
                                    <a class="dropdown-item"
                                        href="{{ route('administrador.show') }}">{{ __('Administración') }}</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.checkout') }}">
                                <i class="bi bi-basket-fill icono-nav"></i>
                                <span class="badge badge-danger">
                                    {{ Cart::session(auth()->id())->getContent()->count() }}
                                </span>
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <nav class="navbar-expand-lg navbar-light shadow-sm sticky-top sub-header">
            <p class="text-center mb-0"><b>{{ 'El jardín de los pecados más puros' }}</b></p>
        </nav>
        <main>
            @yield('content')
        </main>
        <!-- Footer -->
        <footer class="footer">
            <a href="{{ url('/') }}"> <img
                    src="{{ URL::asset('storage/uploads/logo/logo-footer-liliths-garden.png') }}" class="mb-4" alt=""
                    width="200vh"></a>
            <p class="text-center m-0">
            <p class="text-center m-0"><span class="p-3"><i class="bi bi-instagram icono-nav"></i></span><span
                    class="p-3"><i class="bi bi-twitter icono-nav"></i></span><span class="p-3"><i
                        class="bi bi-facebook icono-nav"></i></span></p>
            <p class="text-center m-0"><a href="{{route('quienes-somos')}}" class="enlaces">{{ 'Quienes somos' }}</a> | <a
                    href="{{route('politica-privacidad')}}" class="enlaces">{{ 'Politica de privacidad' }}</a> | <a href="{{route('aviso-legal')}}" class="enlaces">{{ 'Aviso legal' }}</a> | <a
                    href="{{ route('contactanos.index') }}" class="enlaces">{{ 'Atención al cliente' }}</a></p>
            <p class="text-center m-0">
                {{ 'Copyright' }}&copy; {{ 'Liliths Garden' }} {{ date('Y') }}.
                {{ 'Todos los derechos reservados.' }}</p>
            <p class="text-center m-0">
                {{ 'Todos los precios de productos, servicios o gastos de envío mostrados en esta página incluyen el IVA correspondiente' }}
            </p>
            </p>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- Buscador --}}
                    <a type="button" class="btn-close float-right" data-bs-dismiss="modal" aria-label="Close"></a>
                    <form action="{{ route('buscador.productos') }}" class="p-3">
                        <input class="form-control" name="pregunta" placeholder="Buscar productos">
                    </form>
                </div>
            </div>
        </div>
    </div>

</html>
