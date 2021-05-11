@extends('layouts.app')
@section('title', 'Administración')
@section('content')

<div class="container">
        <h1>Administración</h1>

        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Usuarios') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('usuarios.index')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar Usuarios') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Productos') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('productos.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Crear Productos') }}
                            </button></a>  
                            <a href="{{route('productos.index')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar Productos') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Fotos Productos') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('foto.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Insertar Imagenes') }}
                            </button></a>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Fotos Carrusel') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('carrusel.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Insertar Carrusel') }}
                            </button></a>  
                            <a href="{{route('carrusel.index')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar Carruseles') }}
                            </button></a>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Categorías') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('categorias.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Crear Categorías') }}
                            </button></a>
                            <a href="{{route('categorias.index')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar Categorías') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Subcategorias') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('subcategorias.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Crear Subcategorías') }}
                            </button></a>
                            <a href="{{route('subcategorias.index')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar Subcategorías') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Relación Categoria Producto') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('relacion.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Crear Relación') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header cabeceras-cartas">{{ __('Pedidos') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('pedidos.pedidos')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar pedidos') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection