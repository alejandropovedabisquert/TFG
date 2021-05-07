<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
    public function add(Product $producto){
        \Cart::session(auth()->id())->add(array(
            'id' => $producto->id,
            'name' => $producto->name,
            'price' => $producto->price,
            'quantity' => 1,
            'associatedModel' => $producto
        ));
        return back()->with('success', 'Producto añadido al carrito satisfactoriamente!');
        
    }
    
    public function checkout(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        $comprobarExistencia = $cartItems->isEmpty();
        $numeroLineas = 1;
        return view('carrito.index', compact('cartItems', 'numeroLineas', 'comprobarExistencia'));
        
    }

    public function delete($producto){
        \Cart::session(auth()->id())->remove($producto);
        return back()->with('success', 'Producto se ha borrado del carrito satisfactoriamente!');
        
    }

    public function clear(){
        \Cart::session(auth()->id())->clear();
        return back();
        
    }

    public function update($producto){
        \Cart::session(auth()->id())->update($producto, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            ),
             
        ]);
        return back();
        
    }
}
