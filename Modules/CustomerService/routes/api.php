<?php

use Illuminate\Support\Facades\Route;
use Modules\CustomerService\Http\Controllers\CustomerServiceController;
use Modules\CustomerService\Http\Controllers\TicketController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('createTicket', [TicketController::class, 'createTicket'])->middleware('can:createTicket');
    Route::get('getUserTickets', [TicketController::class, 'getUserTickets'])->middleware('can:getUserTickets');
    Route::get('getTicketDetails/{ticketId}', [TicketController::class, 'getTicketDetails'])->middleware('can:getTicketDetails');
    Route::post('reply/{ticketId}', [TicketController::class, 'reply'])->middleware('can:reply');
    Route::post('changeStatus/{ticketId}', [TicketController::class, 'changeStatus'])->middleware('can:changeStatus');
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('getRecommendations', [CustomerServiceController::class, 'getRecommendations'])->middleware('can:getRecommendations');
});

