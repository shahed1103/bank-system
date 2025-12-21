<?php

use Illuminate\Support\Facades\Route;
use Modules\Administrative\Http\Controllers\AdministrativeController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('administratives', AdministrativeController::class)->names('administrative');
});
