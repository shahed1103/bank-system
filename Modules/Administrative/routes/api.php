<?php

use Illuminate\Support\Facades\Route;
use Modules\Administrative\Http\Controllers\AdministrativeController;
use Modules\Administrative\Http\Controllers\ReportController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('dailyTransactions',[ReportController::class, 'dailyTransactions'])->middleware('can:dailyTransactions');
    Route::get('accountSummary',[ReportController::class, 'accountSummary'])->middleware('can:accountSummary');
});
