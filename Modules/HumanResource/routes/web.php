<?php

use Illuminate\Support\Facades\Route;
use Modules\HumanResource\Http\Controllers\HumanResourceController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('humanresources', HumanResourceController::class)->names('humanresource');
});
