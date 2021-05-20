@extends('layouts.app')
@section('title', 'Administración Subategorías')
@section('content')
    <div class="container">
        <h1>Subcategorías existentes</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row row-cols-2 row-cols-md-4">
            @foreach ($subcategorias as $subcategoria)
                <div class="col p-2">
                    <div class="card">
                        <a href="{{ route('subcategorias.show', $subcategoria->slug) }}" class="enlaces-productos">
                            <div class="card-body">
                                <div class="col"><b>{{ $subcategoria->name }}</b></div>

                            </div>
                        </a>
                        <div class="card-footer text-muted">
                            <form action="{{ route('subcategorias.destroy', $subcategoria) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('subcategorias.edit', $subcategoria) }}">
                                    <div class="btn btn-primary">Editar</div>
                                </a>
                                <button class="btn btn-danger">Borrar</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        {{ $subcategorias->links() }}
        <a href="{{ route('administrador.show') }}"><button class="btn btn-primary">Administación</button></a>
    @endsection
