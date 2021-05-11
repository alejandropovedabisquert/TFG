@extends('layouts.app')
@section('title', 'Insertar Imágenes')
@section('content')
    <div class="container">
        <h1>Insertar imágenes</h1>

        <div class="row justify-content-center">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Imagen') }}</div>
                    <div class="card-body">
                        <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                            <div class="form-group row">
                                <label for="photo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                        name="photo" required autofocus>

                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Insertar Imagen') }}
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
