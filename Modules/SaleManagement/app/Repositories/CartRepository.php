<?php

namespace Modules\SaleManagement\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\SaleManagement\Models\Cart;

class CartRepository
{

    public function existsInCart(int $product_id, int $user_id)
    {
        return Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->exists();

    }

    public function carts()
    {
        return Cart::where('user_id', Auth::id())->get();
    }
    public function store(array $data)
    {
        // Assuming you have a Cart model and it has a create method
        return Cart::create($data);
    }

    public function removeItem(int $cart_id)
    {
        return Cart::where('id', $cart_id)->delete();
    }

    public function clearCart()
    {
        Cart::where('user_id', Auth::id())->delete();
    }
}
