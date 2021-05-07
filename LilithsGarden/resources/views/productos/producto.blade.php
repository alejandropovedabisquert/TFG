@extends('layouts.app')
@section('title', $producto->name)
    
    <link rel="stylesheet" href="{{ asset('css/visorProductos.css') }}" />
@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Container for the image gallery -->
            <div class="col">
                @if ($comprobarExistencia)
                    <h3>Este producto no contiene imágenes</h3>
                @else
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

                @endif
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

        <div class="container mt-5">
            <h4>Descripción de {{ $producto->name }},
                @foreach ($categorias as $categoria)
                    {{ $categoria->name }}
                @endforeach
            </h4>
            <p>{{ $producto->description }}</p>

        </div>

        {{-- Comentarios --}}
        <div class="container mt-5">
            <div class="container">
                <h4>{{ 'Comentarios' }}</h4>
                @foreach ($comentarios as $comentario)
                    <p><b>{{$comentario->user->name}}</b>{{ ', creado el ' }}{{ $comentario->created_at }}</p>
                    <p>{{ $comentario->comment }}</p>
                    <hr>
                @endforeach

                {{ $comentarios->links() }}
            </div>
            @if (Auth::check())
            <h4 class="mt-5">{{'Coméntanos que te ha parecido el producto '}}{{ $producto->name }}</h4>
                <form action="{{ route('comentario.store') }}" method="post">
                    @csrf
                    <div class="p-2">
                        <input type="hidden" name="product_id" id="product_id" value="{{ $producto->id }}" style="display: none;">
                        <div class="form-floating">
                            <textarea
                            class="form-control ml-1 shadow-none textarea @error('comentario') is-invalid @enderror"
                            name="comentario" id="comentarioFlotante" style="height: 200px"></textarea>
                            @error('comentario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="comentarioFlotante">Deja un comentario</label>
                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none"
                                    type="submit">{{ 'Envia un comentario' }}</button></div>
                        </div>

                    </div>
                </form>
            @endif
        </div>

    </div>

    <script src="{{ asset('js/visorProductos.js') }}" defer></script>
@endsection
