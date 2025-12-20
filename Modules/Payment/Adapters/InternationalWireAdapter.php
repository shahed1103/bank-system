<?php

namespace Modules\Payment\Adapters;

use Modules\Payment\Contracts\PaymentGatewayInterface;
use Modules\Payment\External\SwiftBankSystem;

class InternationalWireAdapter implements PaymentGatewayInterface
{
    private SwiftBankSystem $swift;

    public function __construct()
    {
        $this->swift = new SwiftBankSystem();
    }

    public function pay(float $amount, string $currency, array $meta = []): bool
    {
        // 🔥 Adapter Logic
        $result = $this->swift->sendMoney($amount, $currency);
        return $result === 'SUCCESS';
    }
}
