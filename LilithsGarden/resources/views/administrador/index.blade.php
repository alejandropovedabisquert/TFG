@extends('layouts.app')
@section('title', 'Inicio')
@section('content')

<div class="container">
        <h1>Administración</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Usuarios') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('usuarios.index')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar Usuarios') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Productos') }}</div>
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fotos Productos') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('foto.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Insertar Imagenes') }}
                            </button></a>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Categorias') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('categorias.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Crear Categorias') }}
                            </button></a>
                            <a href="{{route('categorias.index')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Listar Categorias') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Relación Categoria Producto') }}</div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-4">
                            <a href="{{route('relacion.create')}}"><button type="submit" class="btn btn-primary">
                                {{ __('Crear Relación') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection