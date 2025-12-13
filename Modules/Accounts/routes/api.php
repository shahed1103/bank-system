<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\AccountsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {

    Route::post('accounts', [AccountsController::class, 'create']);

    // Route::apiResource('accounts', AccountsController::class)->names('accounts');
});