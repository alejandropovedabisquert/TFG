<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        $nuevoPedido = new Order();
        $nuevoPedido->user_id = $request->user_id;
        $nuevoPedido->deliveryAddress = $request->deliveryAddress;
        $nuevoPedido->save();

        $pedidos = Order::get();

        foreach ($pedidos as $idPedido) {
            $ultimoIdPedido = $idPedido->id;
        }

        foreach ($request->lineaPedido as $req) {
            $nuevaLineaPedido = new OrderLine();
            $nuevaLineaPedido->order_id = $ultimoIdPedido;
            $nuevaLineaPedido->product_id = $req["product_id"];
            $nuevaLineaPedido->quantity = $req["quantity"];
            $nuevaLineaPedido->price = $req["price"];
            $nuevaLineaPedido->save();
        }



        return back();
    }
}
