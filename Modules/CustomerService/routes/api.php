<?php

use Illuminate\Support\Facades\Route;
use Modules\CustomerService\Http\Controllers\CustomerServiceController;
use Modules\CustomerService\Http\Controllers\TicketController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('createTicket', [TicketController::class, 'createTicket']);
    Route::get('getUserTickets', [TicketController::class, 'getUserTickets']);
    Route::get('getTicketDetails/{ticketId}', [TicketController::class, 'getTicketDetails']);
    Route::post('reply/{ticketId}', [TicketController::class, 'reply']);
    Route::post('changeStatus/{ticketId}', [TicketController::class, 'changeStatus']);
});
