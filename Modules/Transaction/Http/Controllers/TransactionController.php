<?php

namespace Modules\Transaction\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\response;
use Illuminate\Http\JsonResponse;
use Modules\Transaction\Services\TransitionService;


class TransactionController extends Controller
{
 public function __construct(TransitionService $adminService){
        $this->adminService = $adminService;
    }

    public function withdraw($accountId ,Request $request ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->withdraw($accountId , $request);
            return Response::Success($data['account'] , $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

    public function deposit($accountId ,Request $request ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->deposit($accountId , $request);
            return Response::Success($data , $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

    public function transfer($accountId ,Request $request ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->transfer($accountId , $request);
            return Response::Success($data , $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }








    ////////////////
 public function getNonApprovedTransition( ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->getNonApprovedTransition();
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

 public function getNonApprovedTransfer( ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->getNonApprovedTransfer();
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }


 public function approveTransition($tranId ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->approveTransition($tranId);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

 public function approveTransfer($tranId ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->approveTransfer($tranId);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }

 public function getTransHistory($accountID ): JsonResponse{
        $data = [];
        try {
            $data = $this->adminService->getTransHistory($accountID);
            return Response::Success($data['account'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            $errors[] = $message;
            $code = $th->getCode() ?: 400;
            return Response::ErrorX($data, $message, $errors, $code);
        }
    }


}
