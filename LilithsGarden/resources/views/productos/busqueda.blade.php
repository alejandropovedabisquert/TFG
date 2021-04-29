@extends('layouts.app')
@section('title', 'Productos')
@section('content')
    <h1>Aqui ira la pagina de todos los productos</h1>
    <div class="container">
        <div class="row row-cols-2 row-cols-md-4">
        @foreach ($productos as $producto)
            <div class="col p-2">
                <div class="card">
                <a href="{{route('productos.show', $producto->slug)}}">
                    <div class="card-body">
                        @foreach ($producto->photos->take(1) as $imagen)
                            <img src="{{URL::asset('storage/'.$imagen->url)}}" class="card-img-top" style="width:100%;">
                        @endforeach
                        <div class="col">{{ $producto->name }}</div>
                        <div class="col">{{$producto->price}}&euro;</div>
                    </div>
                </a>
                @if (Auth::check())
                @if (Auth::user()->role == 1)
                <div class="card-footer text-muted">
                    <form action="{{route('productos.destroy', $producto)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </div>    
                @endif
                @endif

                </div>
            </div>
        @endforeach
    </div>
    </div>

@endsection