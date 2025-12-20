<?php

namespace Modules\CustomerService\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use App\Http\Responses\response;
use Modules\CustomerService\Http\Requests\TicketCreateRequest;
use Modules\CustomerService\Http\Requests\ReplyRequest;
use Modules\CustomerService\Http\Requests\ChangeTicketStatusRequest;
use Modules\CustomerService\Services\TicketService;

class TicketController extends Controller
{
    public function __construct(private TicketService $ticketService) {
        $this->ticketService = $ticketService;
    }

    public function createTicket(TicketCreateRequest $request): JsonResponse {
        $data = [] ;
        try{
            $data = $this->ticketService->createTicket($request);
            return Response::Success($data['ticket'], $data['message']);
        }
        catch(Throwable $th){
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }

    public function getUserTickets(): JsonResponse {
        $data = [] ;
        try{
            $data = $this->ticketService->getUserTickets();
            return Response::Success($data['tickets'], $data['message']);
        }
        catch(Throwable $th){
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }

    public function getTicketDetails($ticketId): JsonResponse {
        $data = [] ;
        try{
            $data = $this->ticketService->getTicketDetails($ticketId);
            return Response::Success($data['ticket'], $data['message']);
        }
        catch(Throwable $th){
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }

    public function reply(ReplyRequest $request, $ticketId): JsonResponse {
        $data = [] ;
        try{
            $data = $this->ticketService->reply($request , $ticketId);
            return Response::Success($data['ticket'], $data['message']);
        }
        catch(Throwable $th){
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }

    public function changeStatus(ChangeTicketStatusRequest $request, $ticketId): JsonResponse {
        $data = [] ;
        try{
            $data = $this->ticketService->changeStatus($request , $ticketId);
            return Response::Success($data['ticket'], $data['message']);
        }
        catch(Throwable $th){
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }
}
