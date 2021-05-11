@extends('layouts.app')
@section('title', 'Administración Categorías')
@section('content')
    <div class="container">
        <h1>Categorías existentes</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row row-cols-2 row-cols-md-4">
            @foreach ($categorias as $categoria)
                <div class="col p-2">
                    <div class="card">
                            <div class="card-body">
                                <div class="col"><b>{{ $categoria->name }}</b></div>

                            </div>
                        <div class="card-footer text-muted">
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('categorias.edit', $categoria) }}">
                                    <div class="btn btn-primary">Editar</div>
                                </a>
                                <button class="btn btn-danger">Borrar</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
            {{ $categorias->links() }}
        </div>
        <a href="{{ route('administrador.show') }}"><button class="btn btn-primary">Administación</button></a>
    @endsection