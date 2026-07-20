<?php

use Illuminate\Support\Facades\Route;
use Modules\CustomerManagement\Http\Controllers\CustomerManagementController;
use Modules\CustomerManagement\Http\Controllers\CustomerPurchaseHistoryController;

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('customers/inactive-customers',[CustomerManagementController::class,'inactiveCustomers'])->name('customers.inactiveCustomers');
    Route::resource('customers', CustomerManagementController::class);
    Route::get('customers/purchase-records/{id}',[CustomerPurchaseHistoryController::class,'purchaseRecord'])->name('customers.purchaseRecord');

});
