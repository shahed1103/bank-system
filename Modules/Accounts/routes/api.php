<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\AccountsController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('createAccount', [AccountsController::class, 'createAccount']);
});

Route::get('getAllTypes', [AccountsController::class, 'getAllTypes']);
Route::get('getAllStatues', [AccountsController::class, 'getAllStatues']);

