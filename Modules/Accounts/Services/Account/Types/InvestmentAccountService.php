<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\InvestmentAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;

class InvestmentAccountService extends BaseAccountService implements AccountInterface
{
    public function create($request): array{
        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request);

        InvestmentAccount::create([
            'account_id' => $account->id,
            // 'risk_level_id' => $additionalData['risk_level_id'], 
            // 'invested_amount' => $additionalData['invested_amount'],
            // 'expected_return_rate' => $additionalData['expected_return_rate'],
            // 'current_value'=> $additionalData['current_value'],
        ]);


        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];    }
}