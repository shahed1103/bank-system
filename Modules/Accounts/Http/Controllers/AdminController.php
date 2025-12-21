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
        $data = [];
        try {
            $data = $this->adminService->approve($accountId);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

    public function reject($accountId , AccountDecisionRequest $request): JsonResponse{
        $data = [];
        try {
            // $account = Account::findOrFail($request->account_id);
            $data = $this->adminService->reject($accountId , $request);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

    public function activete($accountId ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->activete($accountId);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

    public function freeze($accountId  , Request $request ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->freeze($accountId , $request);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

    public function close($accountId  , Request $request): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->close($accountId , $request);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

    public function suspend($accountId ,Request $request): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->suspend($accountId , $request);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

}
