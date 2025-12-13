<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Accounts\Services\Account\AccountFactory;

use Illuminate\Http\Request;
use App\Http\Responses\response;
use Modules\Accounts\Http\Requests\AccountCreateRequest;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class AccountsController extends Controller
{
    // private AccountFactory $accountCreationService;
    
    public function create(AccountCreateRequest $request): JsonResponse{
        
        // try {
            $data = [] ;
            $data = AccountFactory::create($request);
            return Response::Success($data['account'],$data['message'] );
        // }
        // catch (Throwable $th) {
        //     $message = $th->getMessage();
        //     $errors [] = $message;
        //     $code = $th->getCode() ?: 400;
        //     return Response::ErrorX($data , $message , $errors , $code);
        // }
    }
}

