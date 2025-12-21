<?php

namespace Modules\Administrative\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\Administrative\Services\ManagmentDashboardService;
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

protected ManagmentDashboardService $adminService;

public function __construct(ManagmentDashboardService $adminService)
{
    $this->leaderService = $leaderService;
}

public function userCounts(): JsonResponse {
    $data = [];
    try {
        $data = $this->adminService->userCounts();
        return Response::Success($data, $data['message']);
    } catch (Throwable $th) {
        $message = $th->getMessage();
        $errors[] = $message;
        return Response::Error($data, $message, $errors);
    }
}

public function accounts(): JsonResponse {
    $data = [];
    try {
        $data = $this->adminService->accounts();
        return Response::Success($data, $data['message']);
    } catch (Throwable $th) {
        $message = $th->getMessage();
        $errors[] = $message;
        return Response::Error($data, $message, $errors);
    }
}

public function numberOfFreezeAccounts(): JsonResponse {
    $data = [];
    try {
        $data = $this->adminService->numberOfFreezeAccounts();
        return Response::Success($data, $data['message']);
    } catch (Throwable $th) {
        $message = $th->getMessage();
        $errors[] = $message;
        return Response::Error($data, $message, $errors);
    }
}

public function getDailyTransfers(): JsonResponse {
    $data = [];
    try {
        $data = $this->adminService->getDailyTransfers();
        return Response::Success($data, $data['message']);
    } catch (Throwable $th) {
        $message = $th->getMessage();
        $errors[] = $message;
        return Response::Error($data, $message, $errors);
    }
}

public function getDailyTransition(): JsonResponse {
    $data = [];
    try {
        $data = $this->adminService->getDailyTransition();
        return Response::Success($data, $data['message']);
    } catch (Throwable $th) {
        $message = $th->getMessage();
        $errors[] = $message;
        return Response::Error($data, $message, $errors);
    }
}


}
