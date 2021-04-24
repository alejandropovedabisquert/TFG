@extends('layouts.app')
@section('title', $producto->name)
@section('content')
    <h1>Aqui ira la pagina del producto {{$producto->name}}</h1>
    <p>{{$producto->description}}</p>
    @foreach ($imagenes as $imagen)
    <img src="{{URL::asset('storage/'.$imagen->url)}}">
    @endforeach
@endsection