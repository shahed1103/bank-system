<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Payment\Factory\PaymentGatewayFactory;
use Modules\Payment\Services\PaymentService;

class PaymentController extends Controller
{
    public function execute(Request $request)
    {
        $request->validate([
            'amount'   => 'required|numeric|min:1',
            'currency' => 'required|string|size:3',
            'type'     => 'required|string|in:credit_card,wire',
        ]);

        $gateway = PaymentGatewayFactory::make($request->type);

        $service = new PaymentService($gateway);

        $result = $service->execute(
            $request->amount,
            $request->currency
        );

        return response()->json([
            'success' => $result,
            'message' => $result
                ? 'Payment executed successfully'
                : 'Payment failed',
        ]);
    }
}

