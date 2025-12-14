<?php

namespace Modules\Accounts\Services\Account;

interface AccountCreation {
    public function create(array $data): array;
}
