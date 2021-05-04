@extends('layouts.app')
@section('title', 'Administración Categorias')
@section('content')
    <h1>Aqui ira la pagina de todos los Usuarios</h1>
    <div class="container">
        <div class="row row-cols-2 row-cols-md-4">
        @foreach ($categorias as $categoria)
            <div class="col p-2">
                <div class="card">
                    <a href="{{route('categorias.show', $categoria->slug)}}" class="enlaces-productos">
                    <div class="card-body">
                        <div class="col"><b>{{$categoria->name}}</b></div>

                    </div>
                </a>
                <div class="card-footer text-muted">
                    <form action="{{route('categorias.destroy', $categoria)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </div>
              
                </div>
            </div>
        @endforeach
        {{ $categorias->links() }}
    </div>
    <a href="{{route('administrador.show')}}"><button class="btn btn-primary">Administación</button></a>
@endsection