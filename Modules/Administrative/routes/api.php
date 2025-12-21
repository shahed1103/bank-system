<?php

use Illuminate\Support\Facades\Route;
use Modules\Administrative\Http\Controllers\AdministrativeController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('administratives', AdministrativeController::class)->names('administrative');
});
