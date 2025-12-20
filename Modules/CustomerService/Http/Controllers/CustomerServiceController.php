<?php

namespace Modules\CustomerService\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\CustomerService\Services\RecommendationService;
use Illuminate\Http\JsonResponse;
use App\Http\Responses\response;

class CustomerServiceController extends Controller
{
    public function __construct(private RecommendationService $recommendationService) {
        $this->recommendationService = $recommendationService;
    }

    public function getRecommendations(): JsonResponse{
        $data = [] ;
        try {
            $data = $this->recommendationService->getRecommendations();
            return Response::Success($data['recommendations'],$data['message'] );
        }
        catch (Throwable $th) {
            $message = $th->getMessage();
            $errors [] = $message;
            // $code = $th->getCode() ?: 400;
            return Response::Error($data , $message , $errors);
        }
    }
    
}
