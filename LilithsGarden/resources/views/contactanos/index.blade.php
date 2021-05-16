@extends('layouts.app')
@section('title', 'Contáctanos')
@section('content')
    <div class="container">
        <h1>Déjanos un mensaje</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form action="{{ route('contactanos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre: <span class="requerido">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Alex Poveda" value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico: <span class="requerido">*</span></label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="ejemplo@ejemplo.com" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="movil" class="form-label">Teléfono:</label>
                <input type="text" class="form-control @error('movil') is-invalid @enderror" id="movil" name="movil"
                    placeholder="666666666" value="{{ old('movil') }}">
                @error('movil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="number-order" class="form-label">Número pedido:</label>
                <select name="number-order" id="number-order"
                    class="form-select @error('number-order') is-invalid @enderror">
                    <option value="" selected>Selecciona el número de pedido</option>
                    @if (Auth::check())
                        @foreach ($pedidosUsuario as $pedido)
                            <option value="{{ $pedido->id }}">{{ $pedido->id }}</option>
                        @endforeach
                    @endif

                </select>
                @error('number-order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Mensaje: <span class="requerido">*</span></label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"
                    rows="3">{{ old('message') }}</textarea>
                @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Enviar mensaje</button>
        </form>
    </div>
@endsection
