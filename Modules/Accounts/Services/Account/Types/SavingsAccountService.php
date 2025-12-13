<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\SavingsAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Contracts\AccountTypeInterface;

class SavingsAccountService extends BaseAccountService implements AccountTypeInterface
{
    public function create($request)
    {
        $account = $this->createBaseAccount($request);

        SavingsAccount::create([
            'account_id' => $account->id,
            'interest_rate' => $request['interest_rate'],
            'minimum_balance' => $request['minimum_balance'],
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];
    }
}
