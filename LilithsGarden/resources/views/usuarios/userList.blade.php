@extends('layouts.app')
@section('title', 'Administración Usuarios')
@section('content')
    <div class="container">
        <h1>Usuarios</h1>
        <div class="row row-cols-2 row-cols-md-4">
            @foreach ($usuarios as $usuario)
                <div class="col p-2">
                    <div class="card">
                        <a href="{{ route('usuarios.show', $usuario) }}">
                            <div class="card-body">
                                <div class="col">{{ $usuario->name }}</div>
                                <div class="col">{{ $usuario->email }}</div>
                            </div>
                        </a>
                        <div class="card-footer text-muted">
                            <div class="col-md-8 ">
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('usuarios.edit', $usuario) }}">
                                        <div class="btn btn-primary">Editar</div>
                                    </a>
                                    <button class="btn btn-danger">Borrar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            {{ $usuarios->links() }}
        </div>
        <a href="{{ route('administrador.show') }}"><button class="btn btn-primary">Administación</button></a>
    @endsection
