<?php

namespace Modules\Accounts\Services\Account;
use Modules\Accounts\Entities\Account;

interface AccountInterface {
    public function create(array $data , int $userId): array;
    public function getOwnBalance(Account $account): float;
    public function close(Account $account): string;
}


   
