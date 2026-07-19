<?php

use Illuminate\Support\Facades\Route;
use Modules\ProductManagement\Http\Controllers\Api\ProductController;


Route::get("products", [ProductController::class,'index'] );
Route::get('product/{id}',[ProductController::class,'show'] );
