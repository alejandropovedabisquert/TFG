@extends('layouts.layout')
@section('title', $producto->name)
@section('content')
    <h1>Aqui ira la pagina del producto {{$producto->name}}</h1>
    <p>{{$producto->description}}</p>
    <a href="{{route('productos.index')}}">Volver a los productos</a>
@endsection