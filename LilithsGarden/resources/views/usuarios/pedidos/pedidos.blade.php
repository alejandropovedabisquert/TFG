@extends('layouts.app')
@section('title', 'Pedidos')
@section('content')
    <div class="container">
        <h1>Pedidos de {{auth()->user()->name}}</h1>
        @if ($comprobarExistencia)
            <h3>No has realizado ningun pedido todavía</h3>
        @else
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>Número pedido</th>
                    <th>Dirección</th>
                    <th>Precio</th>
                    <th>Fecha pedido</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidosUsuario as $pedido)
                <tr>
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->deliveryAddress}}</td>
                    <td>{{$pedido->totalPrice}}&euro;</td>
                    <td>{{$pedido->created_at}}</td> 
                    <td> <a href="{{route('pedidos.lineasPedido', $pedido)}}" role="button" class="btn btn-primary">Ver detalles</a></td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

@endsection
