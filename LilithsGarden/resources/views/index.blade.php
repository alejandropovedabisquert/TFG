@extends('layouts.app')
@section('title', 'Inicio')
<link rel="stylesheet" href="{{ asset('css/carruselPatrocinadores.css') }}" />
@section('content')
    <div id="infoBanner" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="{{ route('categorias.show', 'para-el-pene') }}"><img src="{{URL::asset('storage/uploads/carrusel/banner-web-pene-recurso-desktop.webp')}}" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="{{ route('categorias.show', 'para-la-vulva') }}"><img src="{{URL::asset('storage/uploads/carrusel/banner-web-vulva-recurso-desktop.webp')}}" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="{{ route('categorias.show', 'vibrador') }}"><img src="{{URL::asset('storage/uploads/carrusel/klarna-pagar-plazos-financiar-desktop.png')}}" alt="..."></a>
            </div>
        </div>
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
            <div class="mover"></div>
          </div>
    </nav>
@endsection

