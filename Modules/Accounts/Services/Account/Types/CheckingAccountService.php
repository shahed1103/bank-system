<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\CheckingAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Contracts\AccountTypeInterface;

class CheckingAccountService extends BaseAccountService implements AccountTypeInterface
{
    public function create($data):array {

        $additionalData = $data->input('additional_data', []);

        $account = $this->createBaseAccount($data);

        CheckingAccount::create([
            'account_id' => $account->id,
            'overdraft_limit' => $additionalData['overdraft_limit'] ?? 0,
            'monthly_fee' => $additionalData['monthly_fee'] ?? 0,
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];     }
}