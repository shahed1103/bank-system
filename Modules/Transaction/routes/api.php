<?php

use Illuminate\Support\Facades\Route;
use Modules\Transaction\Http\Controllers\TransactionController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('transactions', TransactionController::class)->names('transaction');
});


Route::get('suspend/{accountId}', [TransactionController::class, 'suspend']);

Route::post('withdraw/{accountId}', [TransactionController::class, 'withdraw']);
Route::post('deposit/{accountId}', [TransactionController::class, 'deposit']);
Route::post('transfer/{accountId}', [TransactionController::class, 'transfer']);
Route::post('getNonApprovedTransition', [TransactionController::class, 'getNonApprovedTransition']);
Route::post('getNonApprovedTransfer', [TransactionController::class, 'getNonApprovedTransfer']);
Route::post('approveTransition/{tranId}', [TransactionController::class, 'approveTransition']);
Route::post('approveTransfer/{tranId}', [TransactionController::class, 'approveTransfer']);
Route::post('getTransHistory/{tranId}', [TransactionController::class, 'getTransHistory']);




