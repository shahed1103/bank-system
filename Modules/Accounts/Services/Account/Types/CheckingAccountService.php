<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\CheckingAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountCreation;

class CheckingAccountService extends BaseAccountService implements AccountCreation
{
    public function create($request):array {

        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request);

        CheckingAccount::create([
            'account_id' => $account->id,
            'overdraft_limit' => $additionalData['overdraft_limit'] ?? 0,
            'monthly_fee' => $additionalData['monthly_fee'] ?? 0,
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];     }
}