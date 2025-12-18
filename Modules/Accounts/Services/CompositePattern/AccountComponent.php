<?php

namespace Modules\Accounts\Services\CompositePattern;

interface AccountComponent{
    public function getBalance(): array;
    public function close(): array;
}
