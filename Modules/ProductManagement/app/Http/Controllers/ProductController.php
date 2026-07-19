<?php

namespace Modules\ProductManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Modules\ProductManagement\Http\Requests\ProductRequest;
use Modules\ProductManagement\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
         $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $products = $this->productService->getAllProducts();

            return view('productmanagement::products.index', compact('products'));
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       try{
            return view('productmanagement::products.create');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) {
        $product = $request->validated();
        try{
            $this->productService->store($product);
            return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('productmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $product = $this->productService->show($id);
            return view('productmanagement::products.edit', compact('product'));
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id) {
        try{
            $product = $request->validated();
            $this->productService->update($id, $product);
            return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        try{
            $this->productService->delete($id);
            return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
