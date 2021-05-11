<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/factura.css') }}" />
    <title>Factura</title>
</head>

<body>
<div class="row">
        <table class="col">
            <thead>
                <tr>
                    <th>
                        Vendido por:
                    </th>
                    <th>
                        Dirección de envío:
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <p>Lilith's Garden</p>
                    <p>Calle Goleta 6, 10</p>
                </td>
                <td>
                    <p>{{auth()->user()->name}}</p>
                    <p>{{auth()->user()->deliveryAddress}}</p>
                </td>
            </tr>
            </tbody>
        </table>
</div>

    <table id="factura">
        <caption>Factura del pedido {{ $pedido->id }}</caption>
        <thead id="cabeceraTabla">
          <tr>
            <th scope="col" class="filaCabecera">ID Producto</th>
            <th scope="col" class="filaCabecera">Producto</th>
            <th scope="col" class="filaCabecera">Cantidad</th>
            <th scope="col" class="filaCabecera">Precio unitario</th>
            <th scope="col" class="filaCabecera">Precio total</th>
          </tr>
        </thead>
        <tbody id="cuerpoTabla">
            @foreach ($lineasPedido as $lineaPedido)
            <tr>
                <td scope="row" class="filaCuerpo">{{$lineaPedido->product->id}}</td>
                <td class="filaCuerpo"><a href="{{ route('productos.show', $lineaPedido->product->slug) }}"
                        class="enlaces-productos">{{ $lineaPedido->product->name }}</a></td>
                <td class="filaCuerpo">{{ $lineaPedido->quantity }}</td>
                <td class="filaCuerpo">{{ $lineaPedido->product->price }}&euro;</td>
                <td class="filaCuerpo">{{ $lineaPedido->price }}&euro;</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th scope="row" colspan="2"></th>
            <td colspan="3" id="importe" class="filaCuerpo"><b>Importe Total:</b> {{$pedido->totalPrice}}&euro;</td>
          </tr>
        </tfoot>
      </table>
</body>

</html>
