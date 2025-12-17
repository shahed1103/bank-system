<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\CheckingAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;

class CheckingAccountService extends BaseAccountService implements AccountInterface
{

    protected function resolveAccountStatus(): int{
        return 1; // Active
    }

    public function create($request , $userId):array {

        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request , $userId);

        CheckingAccount::create([
            'account_id' => $account->id,
            // 'overdraft_limit' => 500,
            // 'monthly_fee' => 10,
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];
    }
}
