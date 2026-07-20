<?php

use Illuminate\Support\Facades\Route;
use Modules\Marketing\Http\Controllers\EmailMarketingController;


Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('promotions/email',[EmailMarketingController::class,'index'])->name('email.index');
    Route::post('promotions/email/send',[EmailMarketingController::class,'mailSend'])->name('email.mailSend');
});
