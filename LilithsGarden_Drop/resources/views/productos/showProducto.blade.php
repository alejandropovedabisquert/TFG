@extends('layouts.plantilla')
@section('title', $producto->name)
@section('content')
    <h1>Aqui ira el producto indicado, vease: {{$producto->name}}</h1>
    <p><strong>Descripcion: </strong> {{$producto->description}}</p>
    <a href="{{route('home.inicio')}}">Volver al inicio</a>
@endsection