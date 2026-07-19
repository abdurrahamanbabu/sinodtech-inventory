<?php

use Illuminate\Support\Facades\Route;
use Modules\CustomerManagement\Http\Controllers\CustomerManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('customermanagements', CustomerManagementController::class)->names('customermanagement');
});
