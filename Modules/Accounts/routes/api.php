<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\AccountsController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('accounts', [AccountsController::class, 'create']);
});

Route::get('getAllTypes', [AccountsController::class, 'getAllTypes']);
Route::get('getAllStatues', [AccountsController::class, 'getAllStatues']);

