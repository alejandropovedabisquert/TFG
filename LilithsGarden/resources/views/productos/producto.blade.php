@extends('layouts.app')
@section('title', $producto->name)
    <script src="{{ asset('js/visorProductos.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/visorProductos.css') }}" />
@section('content')
    <div class="container">
        <h1>Aqui ira la pagina del producto {{ $producto->name }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- Container for the image gallery -->
        <div class="row">
            <div class="col">
                @foreach ($imagenes as $imagen)
                    <!-- Full-width images with number text -->
                    <div class="mySlides">
                        <img src="{{ URL::asset('storage/' . $imagen->url) }}" style="width:40%">
                    </div>
                @endforeach
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <div class="row">
                    @foreach ($imagenes as $imagen)
                        <div class="col">
                            <img class="demo cursor" src="{{ URL::asset('storage/' . $imagen->url) }}" width="70%"
                                onclick="currentSlide({{ $numeroVisorImagenes++ }})">
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col">
                <div class="card w-50 producto-flotante">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->name }}</h5>
                        <span class="text-dark card-text">
                            @foreach ($categorias as $categoria)
                                {{ $categoria->name }}
                            @endforeach
                        </span>
                        <p class="card-text">{{ $producto->price }}&euro;</p>
                        <form action="{{ route('cart.add', $producto) }}" method="post">
                            @csrf
                            <input type="submit" name="btn" class="btn btn-success w-100" value="Añadir al carrito">
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <div class="container">
            <h4>Descripción de {{ $producto->name }},
                @foreach ($categorias as $categoria)
                    {{ $categoria->name }}
                @endforeach
            </h4>
            <p>{{ $producto->description }}</p>

        </div>

        {{-- Comentarios --}}
        <div class="container">
            <h4>{{'Comentarios'}}</h4>
            @foreach ($comentarios as $comentario)
                <p><b>{{ 'Anónimo' }}</b>{{ ', creado el ' }}{{ $comentario->created_at }}</p>
                <p>{{ $comentario->comment }}</p>
                <hr>
            @endforeach
            @if (Auth::check())
                <form action="{{ route('comentario.store') }}" method="post">
                    @csrf
                    <div class="bg-light p-2">
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="product_id" id="product_id" value="{{ $producto->id }}">
                        <input type="hidden" name="rating" id="rating" value="5">
                        <div class="form-floating">
                            <textarea class="form-control ml-1 shadow-none textarea @error('description') is-invalid @enderror"
                                name="comment" id="comentarioFlotante" style="height: 200px"></textarea>
                                <label for="comentarioFlotante">Deja un comentario</label>
                        </div>
                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none"
                                type="submit">{{ 'Envia un comentario' }}</button></div>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </form>
            @endif
        </div>

    </div>

@endsection
