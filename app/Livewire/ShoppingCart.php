<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public function mount()
    {
        Cart::instance('shopping');
    }

    public function increase($rowId) //funcion que aumenta los item en el carrito de compras
    {
        Cart::instance('shopping');
        Cart::update($rowId, Cart::get($rowId)->qty + 1);

        if (auth()->check()) { // si el user esta autenticado
            Cart::store(auth()->id());
        }

        $this->dispatch('cartUpdated', Cart::count());
    }

    public function decrease($rowId) //funcion que resta en el carrito de compras
    {
        Cart::instance('shopping');
        $item = Cart::get($rowId);

        if ($item->qty > 1) {
            Cart::update($rowId, $item->qty - 1);
        } else {
            Cart::remove($rowId);
        }


        if (auth()->check()) { // si el user esta autenticado
            Cart::store(auth()->id());
        }

        $this->dispatch('cartUpdated', Cart::count());
    }


    public function remove($rowId)
    {
        Cart::instance('shopping');
        Cart::remove($rowId);

        if (auth()->check()) { // si el user esta autenticado
            Cart::store(auth()->id());
        }

        $this->dispatch('cartUpdated', Cart::count());
    }


    public function destroy()  //del boton limpiar carrito
    {
        Cart::instance('shopping');
        Cart::destroy();

        if (auth()->check()) { // si el user esta autenticado
            Cart::store(auth()->id());
        }
        $this->dispatch('cartUpdated', Cart::count());
    }


    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
