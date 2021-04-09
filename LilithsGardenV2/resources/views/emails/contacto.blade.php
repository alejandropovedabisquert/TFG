@extends('layouts.layout')
@section('title', 'Contactanos')
@section('content')
    <h1>Aqui ira la pagina de inicio</h1>
    <p>Correo de prueba</p>
    <p><strong>Nombre:</strong> {{$contacto['name']}}</p>
    <p><strong>Correo:</strong> {{$contacto['correo']}}</p>
    <p><strong>Mensaje:</strong> {{$contacto['mensaje']}}</p>
@endsection