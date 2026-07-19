<?php
use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('index');
});

Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class,'logout'])->name('logout');
