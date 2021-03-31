@extends('layouts.plantilla')
@section('title', 'Registro')
@section('content')
    <h1>Aqui ira el formulario de inicio de sesion</h1>

    <form action="{{route('cuenta.almacenar')}}" method="POST">

        @csrf

        <label>
            Nombre: <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        @error('name')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Apellidos: <br>
            <input type="text" name="surname" value="{{old('surname')}}">
        </label>
        @error('surname')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Correo electrónico: <br>
            <input type="mail" name="email" value="{{old('email')}}">
        </label>
        @error('email')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Dirección: <br>
            <input type="text" name="deliveryAddress" value="{{old('deliveryAddress')}}">
        </label>
        @error('deliveryAddress')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Contraseña: <br>
            <input type="text" name="password">
        </label>
        @error('password')
            <br>
            <small>{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Registrarse</button>
    </form>
@endsection