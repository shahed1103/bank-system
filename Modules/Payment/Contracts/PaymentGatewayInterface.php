<?php

namespace Modules\Payment\Contracts;

interface PaymentGatewayInterface
{
    public function pay(
        float $amount,
        string $currency,
        array $meta = []
    ): bool;
}
