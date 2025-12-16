<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\CheckingAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;

class CheckingAccountService extends BaseAccountService implements AccountInterface
{
    public function create($request):array {

        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request);

        CheckingAccount::create([
            'account_id' => $account->id,
            // 'overdraft_limit' => 500,
            // 'monthly_fee' => 10,
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];
    }
}
