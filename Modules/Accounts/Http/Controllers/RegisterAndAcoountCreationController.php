<?php 

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Http\Responses\response;
use Modules\Accounts\Http\Requests\RegisterWithAccountRequest;
use Modules\Accounts\Services\Collaborate\RegisterAndAccountCreation;

use Illuminate\Http\JsonResponse;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class RegisterAndAcoountCreationController{

    private RegisterAndAccountCreation $registerAndAccountCreation;
    
    public function __construct(RegisterAndAccountCreation $registerAndAccountCreation){
        $this->registerAndAccountCreation = $registerAndAccountCreation;
    }
    
    public function registerUserWithAccount(RegisterWithAccountRequest $request): JsonResponse{
        $data = [] ;
        try {
            $data = $this->registerAndAccountCreation->registerUserWithAccount($request);
            return Response::Success($data['userAccounut'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }
}