@extends('layouts.app')
@section('title', 'Lineas de pedidos')
@section('content')
    <div class="container">
        <h1>Productos del pedido {{$pedido->id}}</h1>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            @foreach ($lineasPedido as $lineaPedido)
            <tr>
                <td>
                @foreach ($lineaPedido->product->photos->take(1) as $imagen)
                    <img src="{{URL::asset('storage/'.$imagen->url)}}" width="100vh">
                    @endforeach
                </td>
                <td><a href="{{ route('productos.show', $lineaPedido->product->slug) }}" class="enlaces-productos">{{$lineaPedido->product->name}}</a></td>
                <td>{{$lineaPedido->quantity}}</td>
                <td>{{$lineaPedido->price}}&euro;</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Volver</a>
        @if (Auth::check() && auth()->user()->role == 1)
            <a href="{{route('pedidos.pedidos')}}" role="button" class="btn btn-primary">Volver a administración de pedidos</a>
        @endif
    </div>

@endsection