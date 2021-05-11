<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class generadorFaturaController extends Controller
{
    public function imprimir(Order $pedido)
    {
        try {
            if ($pedido->user_id == auth()->user()->id) {
                $lineasPedido = $pedido->orderLines;
                $pdf = \PDF::loadView('generador-pdf/pdf', compact('lineasPedido', 'pedido'));
                return $pdf->download('factura.pdf');
            } else {
                return back();
            }
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }
}
