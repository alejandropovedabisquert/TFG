@extends('layouts.app')
@section('title', 'Administración Relación')
@section('content')

    <div class="container">
        <h1>Relaciona el producto con la categoría</h1>
        <div class="row justify-content-center">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Categoria') }}</div>
                    <div class="card-body">
                        <form action="{{ route('relacion.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="category_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Categoria') }}</label>

                                <div class="col-md-6">
                                    <select name="category" id="category" class="form-select">
                                        @foreach ($subcategorias as $subcategoria)
                                            <option value="{{ $subcategoria->id }}">{{ $subcategoria->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="product_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Producto') }}</label>

                                <div class="col-md-6">
                                    <select name="product" id="product" class="form-select">
                                        @foreach ($productos as $producto)
                                            <option value="{{ $producto->id }}">{{ $producto->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('product_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear Relación') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('administrador.show') }}"><button class="btn btn-primary">Administación</button></a>
    </div>
@endsection
