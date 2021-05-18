@extends('layouts.app')
@section('title', 'Editar Producto')
@section('content')
<div class="container">
       <h1>Editar producto {{$producto->name}}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header cabeceras-cartas">{{ __('Producto') }}</div>
                <div class="card-body">
                    <form action="{{route('productos.update', $producto)}}" method="POST" >
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$producto->name}}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$producto->price}}" required autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Existencias') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{$producto->stock}}" required autofocus>

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" name="description" class="md-textarea form-control @error('description') is-invalid @enderror" rows="3" required>{{$producto->description}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar Producto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('administrador.show')}}"><button class="btn btn-primary">Administación</button></a>
</div>
@endsection