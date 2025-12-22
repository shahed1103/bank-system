<?php

namespace Modules\Payment\Adapters;

use Modules\Payment\Contracts\PaymentGatewayInterface;
use Modules\Payment\External\CreditCardSystem;

class CreditCardAdapter implements PaymentGatewayInterface
{
    private CreditCardSystem $system;

    public function __construct()
    {
        $this->system = new CreditCardSystem();
    }

    public function pay(float $amount, string $currency): bool
    {
        return $this->system->chargeCard($amount);
    }
}
