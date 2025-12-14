<?php

namespace Modules\Accounts\Services\Account;

use Modules\Accounts\Entities\Account;

abstract class BaseAccountService
{
    protected function createBaseAccount($request): Account{
        return Account::create([
            'user_id' => auth()->id(),
            'account_type_id' => $request['account_type_id'],
            'account_status_id' => 1, 
            'account_number' => $this->generateAccountNumber(),
            'balance' => 0,
            // 'parent_id' => $parentId
        ]);
    }

    protected function generateAccountNumber(): string{
        return 'ACC-' . now()->format('Ymd') . '-' . rand(100000, 999999);
    }
}
