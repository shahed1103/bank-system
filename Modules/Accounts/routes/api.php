<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\AccountsController;
use Modules\Accounts\Http\Controllers\RegisterAndAcoountCreationController;
use Modules\Accounts\Http\Controllers\AdminController;
use Modules\Accounts\Http\Controllers\AccountHierarchyController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('getAllTypes', [AccountsController::class, 'getAllTypes'])->middleware('can:getAllTypes');
    Route::post('createAccount', [AccountsController::class, 'createAccount'])->middleware('can:createAccount');
    Route::get('getAllStatues', [AccountsController::class, 'getAllStatues'])->middleware('can:getAllStatues');
    Route::get('approve/{accountId}', [AdminController::class, 'approve'])->middleware('can:approve');;
    Route::post('reject/{accountId}', [AdminController::class, 'reject'])->middleware('can:reject');;
    Route::get('total-balance/{accountId}', [AccountHierarchyController::class, 'totalBalance'])->middleware('can:total-balance');;
    Route::get('close-hierarchy/{accountId}',[AccountHierarchyController::class, 'closeHierarchy'])->middleware('can:close-hierarchy');;
    Route::post('activete/{accountId}', [AdminController::class, 'activete']);
Route::post('freeze/{accountId}', [AdminController::class, 'freeze']);
Route::post('close/{accountId}', [AdminController::class, 'close']);
Route::post('suspend/{accountId}', [AdminController::class, 'suspend']);

});

Route::post('registerUserWithAccount', [RegisterAndAcoountCreationController::class, 'registerUserWithAccount']);



