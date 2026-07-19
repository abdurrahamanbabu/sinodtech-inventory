<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/",[AuthController::class, 'index'])->name("login");
Route::post('/authentication', [AuthController::class, 'login'])->name('auth.login');



