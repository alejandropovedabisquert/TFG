<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
    public function add(Product $producto)
    {
        try {
            \Cart::session(auth()->id())->add(array(
                'id' => $producto->id,
                'name' => $producto->name,
                'price' => $producto->price,
                'quantity' => 1,
                'associatedModel' => $producto
            ));
            return back()->with('success', 'Producto añadido al carrito satisfactoriamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function checkout()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        $comprobarExistencia = $cartItems->isEmpty();
        $numeroLineas = 1;
        return view('carrito.index', compact('cartItems', 'numeroLineas', 'comprobarExistencia'));
    }

    public function delete($producto)
    {
        try {
            \Cart::session(auth()->id())->remove($producto);
            return back()->with('success', '¡El producto se ha borrado del carrito satisfactoriamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function clear()
    {
        try {
            \Cart::session(auth()->id())->clear();
            return back()->with('success', '¡Has vaciado el carrito!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function update($producto)
    {

        try {
            \Cart::session(auth()->id())->update($producto, [
                'quantity' => array(
                    'relative' => false,
                    'value' => request('quantity')
                ),

            ]);
            return redirect()->route('cart.checkout');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }
}
