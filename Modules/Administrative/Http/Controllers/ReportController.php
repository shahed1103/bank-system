<?php

namespace Modules\Administrative\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Modules\Administrative\Services\ReportService;

class ReportController extends Controller
{
    private ReportService $reportService;
    
    public function __construct(ReportService $reportService){
        $this->reportService = $reportService;
    }

    public function dailyTransactions(): JsonResponse{
        $data = [] ;
        // try {
            $data = $this->reportService->dailyTransactions();
            return Response::Success($data['Transaction Report'],$data['message'] );
        // }
        // catch (Throwable $th) {
        //     $message = $th->getMessage();
        //     $errors [] = $message;
        //     return Response::Error($data , $message , $errors);
        // }
    }

    public function accountSummary(): JsonResponse{
        $data = [] ;
        try {
            $data = $this->reportService->accountSummary();
            return Response::Success($data['Account Summary'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            return Response::Error($data , $message , $errors);
        }
    }
}