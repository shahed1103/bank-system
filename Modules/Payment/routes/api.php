<?php

use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\PaymentController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/payments/execute', [PaymentController::class, 'execute']);
});