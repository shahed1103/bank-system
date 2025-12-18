<?php

namespace Modules\Accounts\Services\Account\CompositePattern;

interface AccountComponent{
    public function getBalance(): float;
    public function close(): void;
}
