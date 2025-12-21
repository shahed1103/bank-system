<?php

namespace Modules\Administrative\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\Accounts\Services\Account\Factory\AccountFactory;
use Illuminate\Http\Request;
use App\Http\Responses\response;
use Modules\Accounts\Http\Requests\AccountCreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Modules\Accounts\Entities\AccountType;
use Modules\Accounts\Entities\AccountStatus;

class ManagmentController extends Controller
{

    public function userCounts(): JsonResponse{
    $data = [] ;
    try {
        $service = $this->accountFactory->userCounts();
        return Response::Success($data['account'],$data['message'] );
    }
    catch (Throwable $th) {
        $message = $th->getMessage();
        $errors [] = $message;
        $code = $th->getCode() ?: 400;
        return Response::ErrorX($data , $message , $errors , $code);
    }
}

    public function accounts(): JsonResponse{
    $data = [] ;
    try {
        $service = $this->accountFactory->accounts();
        return Response::Success($data['account'],$data['message'] );
    }
    catch (Throwable $th) {
        $message = $th->getMessage();
        $errors [] = $message;
        $code = $th->getCode() ?: 400;
        return Response::ErrorX($data , $message , $errors , $code);
    }
}


    public function numberOfFreezeAccounts(): JsonResponse{
    $data = [] ;
    try {
        $service = $this->accountFactory->numberOfFreezeAccounts();
        return Response::Success($data['account'],$data['message'] );
    }
    catch (Throwable $th) {
        $message = $th->getMessage();
        $errors [] = $message;
        $code = $th->getCode() ?: 400;
        return Response::ErrorX($data , $message , $errors , $code);
    }
}

    public function getDailyTransfers(): JsonResponse{
    $data = [] ;
    try {
        $service = $this->accountFactory->getDailyTransfers();
        return Response::Success($data['account'],$data['message'] );
    }
    catch (Throwable $th) {
        $message = $th->getMessage();
        $errors [] = $message;
        $code = $th->getCode() ?: 400;
        return Response::ErrorX($data , $message , $errors , $code);
    }
}

    public function getDailyTransition(): JsonResponse{
    $data = [] ;
    try {
        $service = $this->accountFactory->getDailyTransition();
        return Response::Success($data['account'],$data['message'] );
    }
    catch (Throwable $th) {
        $message = $th->getMessage();
        $errors [] = $message;
        $code = $th->getCode() ?: 400;
        return Response::ErrorX($data , $message , $errors , $code);
    }
}

}
