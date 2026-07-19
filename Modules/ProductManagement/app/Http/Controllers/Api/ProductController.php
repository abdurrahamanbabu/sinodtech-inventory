<?php

namespace Modules\ProductManagement\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ProductManagement\Services\ProductService;
use Modules\ProductManagement\Transformers\ProductResource;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
         $this->productService = $productService;
    }

    public function index()
    {
        $products = ProductResource::collection($this->productService->getAllProducts(20));
        return response()->json([
            "data" => $products
        ]);
    }

    public function show($id)
    {
        $product = $this->productService->show($id);
        return response()->json([
            "data"=> new ProductResource( $product)
        ]);
    }
}
