<?php

namespace Modules\Payment\Factory;

use Modules\Payment\Contracts\PaymentGatewayInterface;
use Modules\Payment\Adapters\CreditCardAdapter;
use Modules\Payment\Adapters\InternationalWireAdapter;
use InvalidArgumentException;

class PaymentGatewayFactory
{
    public static function make(string $type): PaymentGatewayInterface
    {
        return match ($type) {
            'credit_card' => new CreditCardAdapter(),
            'wire'        => new InternationalWireAdapter(),
            default       => throw new InvalidArgumentException('Unsupported payment gateway'),
        };
    }
}
