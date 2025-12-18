<?php

namespace Modules\Accounts\Services\CompositePattern;
use Modules\Accounts\Entities\Account;

class AccountLeaf implements AccountComponent
{
    public function __construct(private Account $account) {
        $this->account = $account;
    }

    public function getBalance(): array{
        $message = 'Account hierarchy balance retrived successfully';
        return ['balance' => $this->account->getOwnBalance() , 'message' => $message];
    }

    public function close(): array{
        $this->account->update([
            'account_status_id' => AccountStatus::CLOSED
        ]);

        $message = 'Account hierarchy closed successfully';
        return ['close' => $this->account , 'message' => $message];
    }
}
