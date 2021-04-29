@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <h1>Carrito</h1>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cartItems as $item)
            <tr>
                <td scope="row">{{$item->name}}</td>
                <td>
                    {{\Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                </td>
                <td>
                    <form action="{{route('cart.update', $item->id)}}">
                        <input name="quantity" type="number" value="{{$item->quantity}}" style="width: 50px;">
                        <button class="btn btn-success">Guardar</button>
                    </form>
                </td>
                <td><a href="{{route('cart.delete', $item->id)}}" role="button" class="btn btn-danger">Borrar</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <form action="{{route('pedido.store')}}" method="post">
        @csrf
        <h3>Precio total: {{Cart::session(auth()->id())->getTotal()}}&euro;</h3>
        <input type="hidden" name="carrito" value="{{$cartItems}}">
        <div class="mt-2 text-right"><button class="btn btn-primary shadow-none" type="submit">{{'Comprar'}}</button></div>
    </form>
</div>
@endsection