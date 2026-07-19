<?php

namespace Modules\ProductManagement\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\ProductManagement\Models\Product;

class ProductRepository
{
    public function store(array $product) {
        return Product::create([
            "name" => $product['name'],
            "description" => isset($product['description']) ? $product['description'] : null,
            "price" => $product['price'],
            "sku" => $product['sku'],
            "quantity" => $product['stock'],
            "created_by" => Auth::user()->id
        ]);
    }

    public function getAllProducts($limit = 10) {
        return Product::latest()->with(['createdBy'])->paginate($limit);
    }

    public function show(int $id)
    {
        return Product::findOrFail($id);
    }

    public function lockById(int $id)
    {
       return Product::where('id', $id)->lockForUpdate()->first();
    }


    public function update(int $id, array $product) {

        $existingProduct = $this->show($id);
        if( $existingProduct){
            $existingProduct->update([
                "name" => $product['name'],
                "description" => isset($product['description']) ? $product['description'] : null,
                "price" => $product['price'],
                "sku" => $product['sku'],
                "quantity" => $product['stock'],
            ]);
            return $existingProduct;
        }
        return false;

    }

    public function delete(int $id) {
       return  Product::where('id', $id)->delete();
    }
}
