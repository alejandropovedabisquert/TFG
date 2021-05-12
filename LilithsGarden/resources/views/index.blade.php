@extends('layouts.app')
@section('title', 'Inicio')
<link rel="stylesheet" href="{{ asset('css/carruselPatrocinadores.css') }}" />
@section('content')
    <div id="infoBanner" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach( $carruseles as $carrusel )
                <li data-target="#infoBanner" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach( $carruseles as $carrusel )
            <div class="carousel-item {{ $loop->first ? ' active' : '' }}" >
                <a href="{{route('subcategorias.show', $carrusel->subcategory)}}">
                    <img src="{{URL::asset('storage/'.$carrusel->url)}}" alt="..." width="50%">
                </a>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#infoBanner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
          <a class="carousel-control-next" href="#infoBanner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>

    <nav class="navbar-expand-lg navbar-light shadow-sm header p-2">
        <h3 class="text-center mb-0 p-2"><b>{{ 'Novedades' }}</b></h3>
    </nav>
    <div class="container">
        <div class="row row-cols-2 row-cols-md-4">
        @foreach ($productos as $producto)
            <div class="col p-2">
            <a href="{{route('productos.show', $producto->slug)}}" class="enlaces-productos">
                <div class="card cartas-inicio">
                        @foreach ($producto->photos->take(1) as $imagen)
                            <img src="{{URL::asset('storage/'.$imagen->url)}}" class="card-img-top">
                        @endforeach
                        <div class="col text-center"><b>{{ $producto->name }}</b></div>
                        <div class="col text-center">{{$producto->price}}&euro;</div>
                </div>
            </a>
            </div>
        @endforeach
        </div>
    </div>
    <nav class="navbar-expand-lg navbar-light shadow-sm header p-2">
        <h3 class="text-center mb-0 p-2"><b>{{ 'Empresas patrocinadoras' }}</b></h3>
          <div class="tech-slideshow">
            <div class="mover-1"></div>
            <div class="mover-2"></div>
          </div>
    </nav>
    <div class="container">
        <ul>
            <li>
                <b id="atencion-cliente">{{ 'Atención al cliente' }}</b>
            </li>
            <li>
                <a href="{{ route('contactanos.index') }}" class="enlaces">{{ 'Preguntas frecuentes' }}</a>
            </li>
            <li>
                <a href="{{ route('contactanos.index') }}" class="enlaces">{{ 'Acerca de los envios' }}</a>
            </li>
            <li>
                <a href="{{ route('contactanos.index') }}" class="enlaces">{{ 'Política de privacidad' }}</a>
            </li>
            <li>
                <a href="{{ route('contactanos.index') }}" class="enlaces">{{ 'Contacta con nosotros' }}</a>
            </li>
        </ul>
    </div>
@endsection

