<?php

namespace Modules\SaleManagement\Services;

use Illuminate\Support\Carbon;
use Modules\ProductManagement\Services\ProductService;
use Modules\SaleManagement\Repositories\SaleRepository;

class SaleService
{
    protected $saleRepo, $cartService, $productService;
    public function __construct(SaleRepository $saleRepository, CartService $cartService , ProductService $productService)
    {
           $this->saleRepo = $saleRepository;
           $this->cartService = $cartService;
           $this->productService = $productService;
    }

    public function getAll($limit = 10)
    {
        return $this->saleRepo->getAll($limit);
    }

    public function store($data)
    {

        $carts = $this->cartService->carts();
        $cart_total = cartTotal();
        $sale_data = [
            "customer_id"=> $data["customer_id"],
            "total_amount" => $cart_total,
            "paid_amount" => $data['pay'],
            "due_amount" =>  $cart_total - $data['pay'],
            "invoice_no" => $this->generateInvoice(),

        ];

       $sale = $this->saleRepo->store($sale_data);
       $sale_items  = [];
       foreach($carts as $cart) {
            $product = $this->productService->lockById($cart->product_id);
            if($product){
                $product->quantity = $product->quantity - $cart->quantity;
                $product->save();
            }

            $sale_items[] = [
                "sale_id" => $sale->id,
                "quantity" => $cart->quantity,
                "price" => $cart->price,
                "product_id" => $cart->product_id,
                'created_at' => Carbon::now()
            ];
       }
       if($this->saleRepo->saveSaleItems($sale_items)){
             $this->cartService->clearCart();
             return true;
       }
       return false;
    }


    public function generateInvoice()
    {
        $countSale = $this->saleRepo->countSale();
        $formatted = sprintf('%04d', $countSale + 1);
        return date("Y").'-'.$formatted;
    }

    public function customerPuchases(int $customer_id, array $data = [])
    {
        return $this->saleRepo->customerPuchases($customer_id, $data);
    }
}
