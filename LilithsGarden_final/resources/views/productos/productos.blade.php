@extends('layouts.app')
@section('title', 'Administración Productos')
@section('content')
    <div class="container">
        <h1>Productos existentes</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row row-cols-2 row-cols-md-4">
            @foreach ($productos as $producto)
                <div class="col p-2">
                    <div class="card">
                        <a href="{{ route('productos.show', $producto->slug) }}" class="enlaces-productos">
                            @foreach ($producto->photos->take(1) as $imagen)
                                <img src="{{ URL::asset('storage/' . $imagen->url) }}" class="card-img-top"
                                    style="width:100%;">
                            @endforeach
                            <div class="col text-center"><b>{{ $producto->name }}</b></div>
                            <div class="col text-center">{{ $producto->price }}&euro;</div>
                        </a>
                        <div class="card-footer text-muted">
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('productos.edit', $producto) }}">
                                    <div class="btn btn-primary">Editar</div>
                                </a>
                                <button class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $productos->links() }}<a href="{{ route('administrador.show') }}"><button
                class="btn btn-primary">Administación</button></a>
    </div>
    @endsection
