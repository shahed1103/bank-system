<?php

namespace Modules\Payment\Contracts;

interface PaymentGatewayInterface
{
    public function pay(
        float $amount,
        string $currency,
    ): bool;
}
