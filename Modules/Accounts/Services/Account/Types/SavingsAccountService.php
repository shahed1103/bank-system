<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\SavingsAccount;

use Modules\Accounts\Services\Account\BaseAccountService;

class SavingsAccountService extends BaseAccountService 
{
    public function create($request): array{
        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request);

        SavingsAccount::create([
            'account_id' => $account->id,
            'interest_rate' => $additionalData['interest_rate'],
            'minimum_balance' => $additionalData['minimum_balance'],
            'withdraw_limit_per_month' => $additionalData['withdraw_limit_per_month'],
        ]);
        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];
    }
}
