<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\AccountsController;
use Modules\Accounts\Http\Controllers\RegisterAndAcoountCreationController;
use Modules\Accounts\Http\Controllers\AdminController;



Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('createAccount', [AccountsController::class, 'createAccount']);
});

Route::get('getAllTypes', [AccountsController::class, 'getAllTypes']);
Route::get('getAllStatues', [AccountsController::class, 'getAllStatues']);

Route::post('registerUserWithAccount', [RegisterAndAcoountCreationController::class, 'registerUserWithAccount']);

Route::get('approve/{accountId}', [AdminController::class, 'approve']);

