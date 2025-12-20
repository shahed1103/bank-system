<?php

namespace Modules\Payment\Services;

use Modules\Payment\Contracts\PaymentGatewayInterface;

class PaymentService
{
    public function __construct(
        private PaymentGatewayInterface $gateway
    ) {}

    public function execute(float $amount, string $currency): bool
    {
        return $this->gateway->pay($amount, $currency);
    }
}
