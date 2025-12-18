<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Responses\response;

use Illuminate\Routing\Controller;
use Modules\Accounts\Services\CompositePattern\AccountHierarchyService;
use Illuminate\Http\JsonResponse;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class AccountHierarchyController extends Controller
{
    private AccountHierarchyService $accountHierarchyService;
    
    public function __construct(AccountHierarchyService $accountHierarchyService){
        $this->accountHierarchyService = $accountHierarchyService;
    }

    public function totalBalance(int $accountId): JsonResponse{
        $data = [] ;
        try {
            $component = $this->accountHierarchyService->build($accountId);
            $data = $component->getBalance();
            return Response::Success($data['balance'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data , $message , $errors , $code);
        }
    }

    public function closeHierarchy(int $accountId): JsonResponse{
        $data = [] ;
        try {
            $component = $this->accountHierarchyService->build($accountId);
            $data = $component->close();
            return Response::Success($data['close'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data , $message , $errors , $code);
        }
    }
}
