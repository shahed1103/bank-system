<?php

use Illuminate\Support\Facades\Route;
use Modules\CustomerService\Http\Controllers\CustomerServiceController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('customerservices', CustomerServiceController::class)->names('customerservice');
});
