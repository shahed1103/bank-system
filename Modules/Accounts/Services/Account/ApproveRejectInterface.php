<?php

namespace Modules\Accounts\Services\Account;
use Modules\Accounts\Entities\Account;

interface ApproveRejectInterface
{
    public function approve(Account $account): void;
    public function reject(Account $account, array $data): array;
}
