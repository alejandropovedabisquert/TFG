@extends('layouts.app')
@section('title', 'Carrito')
@section('content')

    <div class="container">
        <h1>Carrito</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($comprobarExistencia)
            <h3>Todavía no tienes ningún producto en el carrito</h3>
        @else
            <div class="pt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Precio unitario</th>
                            <th>Cantidad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td scope="row">{{ $item->name }}</td>
                                <td>
                                    {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}&euro;
                                </td>
                                <td>
                                    {{ $item->price }}&euro;
                                </td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}">
                                        <input name="price" type="hidden"
                                            value="{{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}}"
                                            style="width: 50px;">
                                        <input name="quantity" type="number" value="{{ $item->quantity }}"
                                            style="width: 50px;" min="1" max="10">
                                        <button class="btn btn-success">Guardar</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('cart.delete', $item->id) }}" role="button"
                                        class="btn btn-danger">Borrar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3>Precio total: {{ \Cart::session(auth()->id())->getTotal() }}&euro;</h3>

                <form action="{{ route('pedido.store') }}" method="post" name="formulariPago">
                    @csrf
                    <input type="hidden" name="totalPrice" value="{{ \Cart::session(auth()->id())->getTotal() }}">
                    <input type="hidden" name="deliveryAddress" id="deliveryAddress"
                        value="{{ auth()->user()->deliveryAddress }}">
                    <input type="hidden" name="carrito" value="{{ $cartItems }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                    @foreach ($cartItems as $item)
                        <input type="hidden" name='lineaPedido[{{ $numeroLineas }}][product_id]'
                            value="{{ $item->id }}">
                        <input type="hidden" name='lineaPedido[{{ $numeroLineas }}][quantity]'
                            value="{{ $item->quantity }}">
                        <input type="hidden" name='lineaPedido[{{ $numeroLineas }}][price]'
                            value="{{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}">
                        <span class="visually-hidden">{{ $numeroLineas++ }}</span>
                    @endforeach
                    <div class="mt-2 text-right" style="width: 250px; float: right;">
                        <div id="paypal-button-container" ></div>
                        <a href="{{ route('cart.clear') }}" role="button" class="btn btn-danger mt-2">Vaciar carrito</a>
                    </div>
                    
                </form>
               
        @endif

    </div>
    </div>
    @endsection
    <script src="https://www.paypal.com/sdk/js?client-id=AVtuAmt0l_vUByYGq3D-T2I6MGeEYFrApocZ85hJ45YpF7n-eebEeb2Qf68m9VkgnOx_hdIhJfQPbIs0&currency=EUR&disable-funding=card,sofort"></script>
    <script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                application_context: {
          brand_name : 'Productos de Liliths Garden',
        },
                purchase_units: [{
                    amount: {
                        value: {{ \Cart::session(auth()->id())->getTotal() }}
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                document.formulariPago.submit()

            });
        }


    }).render('#paypal-button-container');
</script>
