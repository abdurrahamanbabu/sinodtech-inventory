<?php

use Modules\SaleManagement\Repositories\CartRepository;

if(!function_exists("cartTotal"))
{
    function cartTotal()
    {
         $total = 0;
         $cartRepo = new CartRepository();
         $carts = $cartRepo->carts();

        foreach($carts as $cart){
            $total = $total + $cart->total_price;
        }
        return $total;
    }
}

