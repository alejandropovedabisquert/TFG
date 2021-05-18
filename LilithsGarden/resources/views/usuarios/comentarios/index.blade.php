@extends('layouts.app')
@section('title', 'Administración Comentarios')
@section('content')
    <div class="container">
        <h1>Comentarios</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($comentarios->isEmpty())
            <h3>No hay ningún comentario</h3>
        @else
            <div class="row row-cols-2 row-cols-md-4">
                @foreach ($comentarios as $comentario)
                    <div class="col p-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="col"><b>Comentario de: {{ $comentario->user->name }}</b></div>
                            </div>
                            <div class="card-body">
                                <div class="col scroll-box">{{ $comentario->comment }}</div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="col-md-8 ">
                                    <a href="{{ route('comentarios.destroy', $comentario) }}" role="button"
                                        class="btn btn-danger">Borrar</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $comentarios->links() }}
            </div>
        @endif

        <a href="{{ route('administrador.show') }}"><button class="btn btn-primary">Administación</button></a>
    @endsection
