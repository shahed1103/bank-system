<?php

use Illuminate\Support\Facades\Route;
use Modules\Transaction\Http\Controllers\TransactionController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('transactions', TransactionController::class)->names('transaction');
});



Route::post('withdraw/{accountId}', [TransactionController::class, 'withdraw']);
Route::post('deposit/{accountId}', [TransactionController::class, 'deposit']);
Route::post('transfer/{accountId}', [TransactionController::class, 'transfer']);
Route::get('getNonApprovedTransition', [TransactionController::class, 'getNonApprovedTransition']);
Route::get('getNonApprovedTransfer', [TransactionController::class, 'getNonApprovedTransfer']);
Route::get('approveTransition/{tranId}', [TransactionController::class, 'approveTransition']);
Route::get('approveTransfer/{tranId}', [TransactionController::class, 'approveTransfer']);
Route::get('getTransHistory/{tranId}', [TransactionController::class, 'getTransHistory']);




