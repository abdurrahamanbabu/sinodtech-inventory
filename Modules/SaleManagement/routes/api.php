<?php

use Illuminate\Support\Facades\Route;
use Modules\SaleManagement\Http\Controllers\SaleManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('salemanagements', SaleManagementController::class)->names('salemanagement');
});
