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
        return back();
        
    }
    
    public function checkout(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('carrito.index', compact('cartItems'));
        
    }

    public function delete($producto){
        \Cart::session(auth()->id())->remove($producto);
        return back();
        
    }

    public function update($producto){
        \Cart::session(auth()->id())->update($producto, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);
        return back();
        
    }
}
