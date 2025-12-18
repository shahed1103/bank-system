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
use Modules\Accounts\Entities\AccountType;
use Modules\Accounts\Entities\AccountStatus;

class AccountsController extends Controller
{
    private AccountFactory $accountFactory;
    
    public function __construct(AccountFactory $accountFactory){
        $this->accountFactory = $accountFactory;
    }

    public function createAccount(AccountCreateRequest $request): JsonResponse{
        $data = [] ;
        try {
            $service = $this->accountFactory->make($request['account_type_id']);
            $data = $service->create($request , auth()->user()->id);
            return Response::Success($data['account'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data , $message , $errors , $code);
        }
    }

    public function getAllTypes(): JsonResponse{
        try {
            $data = [] ;
            $data['types'] =  AccountType::select('id', 'name')->get();
            $data['message'] = 'All types are retrived sduccessfully';
            return Response::Success($data['types'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }

    public function getAllStatues(): JsonResponse{
        try {
            $data = [] ;
            $data['statues'] =  AccountStatus::select('id', 'name')->get();
            $data['message'] = 'All statues are retrived sduccessfully';
            return Response::Success($data['statues'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }
}

