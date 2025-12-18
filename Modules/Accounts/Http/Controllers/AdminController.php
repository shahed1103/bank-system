<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Accounts\Services\Admin\AdminService;

use Illuminate\Http\Request;
use App\Http\Responses\response;
use Modules\Accounts\Http\Requests\AccountDecisionRequest;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class AdminController extends Controller
{
    private AdminService $adminService;
    
    public function __construct(AdminService $adminService){
        $this->adminService = $adminService;
    }

    public function approve($accountId): JsonResponse{
        // try {
            $data = [];
            $data = $this->adminService->approve($accountId);
            return Response::Success($data['account'], $data['message']);
        // } catch (Throwable $th) {
        //     $message = $th->getMessage();
        //     $errors[] = $message;
        //     $code = $th->getCode() ?: 400;
        //     return Response::ErrorX($data, $message, $errors, $code);
        // }
    }

    public function reject(AccountDecisionRequest $request , $accountId): JsonResponse{
        try {
            $data = [];
            // $account = Account::findOrFail($request->account_id);
            $this->adminService->reject($request , $accountId);
            // $message = 'Account rejected successfully';
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }
}