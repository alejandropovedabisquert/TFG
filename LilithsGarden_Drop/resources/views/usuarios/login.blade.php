@extends('layouts.plantilla')
@section('title', 'Registro')
@section('content')
    <h1>Aqui ira el login de la cuenta</h1>
    <form action="">
        <label>
            Correo electrónico: <br>
            <input type="mail" name="email">
        </label>
        <br>
        <label>
            Contraseña: <br>
            <input type="text" name="password">
        </label>
        <br>
        <button type="submit">Iniciar sesion</button>
    </form>

@endsection