<?php

namespace Modules\SaleManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\CustomerManagement\Services\CustomerService;
use Modules\ProductManagement\Services\ProductService;
use Modules\SaleManagement\Http\Requests\SaleRequest;
use Modules\SaleManagement\Services\CartService;
use Modules\SaleManagement\Services\SaleService;

class SaleManagementController extends Controller
{
    protected $saleService, $customerService, $productService, $cartService;

    public function __construct(ProductService $productService, CartService $cartService, CustomerService $customerService, SaleService $saleService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
        $this->customerService = $customerService;
        $this->saleService = $saleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try{

                $sales = $this->saleService->getAll();
                return view('salemanagement::sales.index',compact('sales'));
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
            $products = $this->productService->getAllProducts();
            $carts = $this->cartService->carts();
            $customers = $this->customerService->customers();
            return view('salemanagement::sales.create', compact('products', 'carts','customers'));
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request) {
        $data = $request->validated();

        try{
          DB::beginTransaction();
          $this->saleService->store($data);
          DB::commit();
          return redirect()->back()->with('success', 'Operation successful.');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }



    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        try {
            $product = $this->productService->show($data['product_id']);
            if (!$product) {
                return response()->json(['error' => 'Product not found.'], 404);
            }

            if ($data['quantity'] > $product->quantity) {
                 return response()->json(['error' => 'Requested quantity exceeds available stock.'], 400);
            }
            if($this->cartService->existsInCart($data['product_id'], Auth::id())){
                    return response()->json(['error' => 'Product already in cart.'], 201);
            }

            $data['price'] = $product->price;
            $data['total_price'] = $product->price * $data['quantity'];
            $data['user_id'] = Auth::id();
            if($this->cartService->store($data)){
                $carts = $this->cartService->carts();
                $view = view('salemanagement::sales.components.cart_items', compact('carts'))->render();
                return response()->json(['success' => 'Product added to cart successfully.', 'carts' => $view, 'total_amount' => cartTotal()]);
            }else{
                return response()->json(['error' => 'Failed to add product to cart.'], 500);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while adding the product to the cart.'], 500);
        }
    }

    public function cartDelete($id)
    {
        try {
          if($this->cartService->removeItem($id)){
            $carts = $this->cartService->carts();
            $view = view('salemanagement::sales.components.cart_items', compact('carts'))->render();
            return response()->json([
                "status" => "success",
                'carts' => $view,
                 'total_amount' => cartTotal()
            ]);
          }
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                'msg' => "Something went wrong"
            ]);
        }
    }


    public function clearCart()
    {
        try{
            $this->cartService->clearCart();
            return redirect()->back()->with("success", 'Cart Cleared !');
        }catch(\Exception $e){
             return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
