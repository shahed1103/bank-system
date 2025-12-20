<?php

namespace Modules\Payment\External;

class SwiftBankSystem
{
    public function sendMoney(float $amount, string $currencyCode): string
    {
        return 'SUCCESS';
    }
}
