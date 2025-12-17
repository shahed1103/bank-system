<?php

namespace Modules\Accounts\Services\Account;
use Carbon\Carbon;

use Modules\Accounts\Entities\Account;

abstract class BaseAccountService
{
    protected function createBaseAccount($request , $userId): Account{
        return Account::create([
            'user_id' => $userId,
            'account_type_id' => $request['account_type_id'],
            'account_status_id' => $this->resolveAccountStatus(),
            'account_number' => $this->generateAccountNumber(),
            'account_name' => $request['account_name'],
            'opened_at' => Carbon::now(),
            'balance' => 0,
            // 'parent_id' => $null
        ]);
    }
    
    abstract protected function resolveAccountStatus(): int;

    protected function generateAccountNumber(): string{
        return 'ACC-' . now()->format('Ymd') . '-' . rand(100000, 999999);
    }
}
