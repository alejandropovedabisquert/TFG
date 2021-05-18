@extends('layouts.app')
@section('title', 'Inicio')
    <link rel="stylesheet" href="{{ asset('css/carruselPatrocinadores.css') }}" />
@section('content')
    @if ($carruseles->isEmpty())

    @else
        <div id="infoBanner" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($carruseles as $carrusel)
                    <li data-target="#infoBanner" data-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach ($carruseles as $carrusel)
                    <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                        <a href="{{ route('subcategorias.show', $carrusel->subcategory) }}">
                            <img src="{{ URL::asset('storage/' . $carrusel->url) }}" alt="..." width="70%">
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
    @endif


    <nav class="navbar-expand-lg navbar-light shadow-sm header p-2">
        <h3 class="text-center mb-0 p-2"><b>{{ 'Novedades' }}</b></h3>
    </nav>
    <div class="container">
        <div class="row row-cols-2 row-cols-md-4">
            @foreach ($productos as $producto)
                <div class="col p-2">
                    <a href="{{ route('productos.show', $producto) }}" class="enlaces-productos">
                        <div class="card cartas-inicio">
                            @foreach ($producto->photos->take(1) as $imagen)
                                <img src="{{ URL::asset('storage/' . $imagen->url) }}" class="card-img-top">
                            @endforeach
                            <div class="col text-center"><b>{{ $producto->name }}</b></div>
                            <div class="col text-center">{{ $producto->price }}&euro;</div>
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
        <div class="row pt-5">
            <div class="col-4 pt-5">
                <ul>
                    <li>
                        <b id="atencion-cliente">{{ 'Subcategorías' }}</b>
                    </li>
                    @foreach ($subcategorias->take(7) as $subcategoria)
                        <li class="pt-2">
                            <a href="{{ route('subcategorias.show', $subcategoria->slug) }}"
                                class="enlaces">{{ $subcategoria->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-4 pt-5">
                <ul>
                    <li>
                        <b id="atencion-cliente">{{ 'Lo más vendido' }}</b>
                    </li>
                    @foreach ($randomizadorProductos->take(7) as $productoRandom)
                        <li class="pt-2">
                            <a href="{{ route('productos.show', $productoRandom->slug) }}"
                                class="enlaces">{{ $productoRandom->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-4 pt-5">
                        <div class="col">
                            <div class="card cartas-inicio">
                                <img src="{{ URL::asset('storage/uploads/info-extra/envio-seguro.png') }}" alt="" width="15%">
                                <div class="col text-center"><b>Envío 100% discreto</b></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card cartas-inicio">
                                <img src="{{ URL::asset('storage/uploads/info-extra/garantia.png') }}" alt="" width="15%">
                                <div class="col text-center"><b>2 años de garantía</b></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card cartas-inicio">
                                <img src="{{ URL::asset('storage/uploads/info-extra/ssl.png') }}" alt="" width="15%">
                                <div class="col text-center"><b>Pago seguro</b></div>
                            </div>
                        </div>

            </div>

        </div>

    </div>
@endsection
