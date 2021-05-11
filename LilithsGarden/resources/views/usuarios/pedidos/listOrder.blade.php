@extends('layouts.app')
@section('title', 'Administración Pedidos')
@section('content')
    <div class="container">
        <h1>Administración de pedidos</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($pedidos->isEmpty())
            <h3>No hay ningún pedido</h3>
        @else
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th>Número pedido</th>
                        <th>Usuario</th>
                        <th>Dirección</th>
                        <th>Precio</th>
                        <th>Fecha pedido</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->user->name }}</td>
                            <td>{{ $pedido->deliveryAddress }}</td>
                            <td>{{ $pedido->totalPrice }}&euro;</td>
                            <td>{{ $pedido->created_at }}</td>
                            <td>
                                <a href="{{ route('pedidos.lineasPedido', $pedido) }}" role="button"
                                    class="btn btn-info">Ver detalles</a>
                                <a href="{{ route('pedidos.destroy', $pedido) }}" role="button"
                                    class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


@endsection
