@extends('layouts.app')
@section('title', 'Administración editar cateogría')
@section('content')
    <div class="container">
        <h1>Editar categoría</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Categoría') }}</div>
                    <div class="card-body">
                        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $categoria->name }}" required autofocus>

                                    @error('name')
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
                                        {{ __('Editar Categoría') }}
                                    </button>
                                    <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Volver</a>
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
