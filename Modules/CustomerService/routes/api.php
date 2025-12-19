<?php

use Illuminate\Support\Facades\Route;
use Modules\CustomerService\Http\Controllers\CustomerServiceController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('customerservices', CustomerServiceController::class)->names('customerservice');
});
