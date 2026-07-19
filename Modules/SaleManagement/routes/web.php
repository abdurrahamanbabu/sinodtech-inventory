<?php

use Illuminate\Support\Facades\Route;
use Modules\SaleManagement\Http\Controllers\SaleManagementController;


Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    //Sales
    Route::get('sales', [SaleManagementController::class, 'index'])->name('sales.index');
    Route::get('sale-items', [SaleManagementController::class, 'create'])->name('sale-items.create');
    Route::post('sale-items/add-to-cart', [SaleManagementController::class, 'addToCart'])->name('sale-items.add-to-cart');
    Route::post('sale-items/store', [SaleManagementController::class, 'store'])->name('sale-items.store');

    Route::get('sale-items/cart-delete/{id}',[SaleManagementController::class,'cartDelete'])->name('sale-items.cartDelete');

    Route::get('sale-item/cart-clear',[SaleManagementController::class, 'clearCart'])->name('sale-items.clearCart');
});
