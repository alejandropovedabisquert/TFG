@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <div id="infoBanner" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{URL::asset('storage/uploads/carrusel/b2ap3_medium_Sexo-Anal-Pareja.jpg')}}" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{URL::asset('storage/uploads/carrusel/OIP.jpg')}}" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{URL::asset('storage/uploads/carrusel/b2ap3_medium_Sexo-Anal-Pareja.jpg')}}" alt="...">
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
            <a href="{{route('productos.show', $producto->slug)}}">
                <div class="card">
                    <div class="card-body">
                        @foreach ($producto->photos->take(1) as $imagen)
                            <img src="{{URL::asset('storage/'.$imagen->url)}}" class="card-img-top" style="width:100%;">
                        @endforeach
                        <div class="col">{{ $producto->name }}</div>
                        <div class="col">{{$producto->price}}&euro;</div>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
        </div>
    </div>
    <nav class="navbar-expand-lg navbar-light shadow-sm header p-2">
        <h3 class="text-center mb-0 p-2"><b>{{ 'Datos de interes' }}</b></h3>
    </nav>
@endsection