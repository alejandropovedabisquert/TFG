@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <h1>Aqui ira la pagina de inicio</h1>

    {{-- <ul>
        @foreach ($products as $product)
        <a href="{{route('producto.mostrar', $product)}}">
            <li>{{$product->name}}</li>
        </a>
        @endforeach
    </ul>

    {{ $products->links() }} --}}
@endsection