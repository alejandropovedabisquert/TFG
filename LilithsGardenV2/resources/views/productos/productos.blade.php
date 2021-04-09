@extends('layouts.layout')
@section('title', 'Productos')
@section('content')
    <h1>Aqui ira la pagina de todos los productos</h1>
    <ul>
        @foreach ($productos as $producto)
            <li><a href="{{route('productos.show', $producto)}}">{{$producto->name}}</a></li>
        @endforeach
    </ul>
    {{$productos->links()}}
@endsection