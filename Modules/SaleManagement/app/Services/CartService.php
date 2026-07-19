<?php

namespace Modules\SaleManagement\Services;

use Modules\SaleManagement\Repositories\CartRepository;

class CartService
{
    protected $cartRepo;
    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function existsInCart(int $product_id, int $user_id)
    {
        return $this->cartRepo->existsInCart($product_id, $user_id);
    }

    public function carts()
    {
        return $this->cartRepo->carts();
    }

    public function store(array $data)
    {
        return $this->cartRepo->store($data);
    }

    public function removeItem(int $cart_id)
    {
        return $this->cartRepo->removeItem($cart_id);
    }

    public function clearCart()
    {
        return $this->cartRepo->clearCart();
    }
}
