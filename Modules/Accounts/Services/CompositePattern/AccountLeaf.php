<?php

namespace Modules\Accounts\Services\Account\CompositePattern;

class AccountLeaf implements AccountComponent
{
    public function __construct(protected Account $account) {}

    public function getBalance(): float
    {
        return $this->account->balance;
    }

    public function close(): void
    {
        $this->account->update([
            'account_status_id' => AccountStatus::CLOSED
        ]);
    }
}
