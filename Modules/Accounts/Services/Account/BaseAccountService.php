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
            // 'parent_id' => $null
        ]);
    }

    protected function updateBaseAccount(Account $account, array $data): void
    {
        if (isset($data['account_status_id'])) {
            $account->update([
                'account_status_id' => $data['account_status_id'],
            ]);
        }
    }

    protected function generateAccountNumber(): string{
        return 'ACC-' . now()->format('Ymd') . '-' . rand(100000, 999999);
    }
}
