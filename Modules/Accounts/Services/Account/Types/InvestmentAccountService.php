<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\InvestmentAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Contracts\AccountTypeInterface;

class InvestmentAccountService extends BaseAccountService implements AccountTypeInterface
{
    public function create($data): array{
        $additionalData = $data->input('additional_data', []);

        $account = $this->createBaseAccount($data);

        InvestmentAccount::create([
            'account_id' => $account->id,
            'risk_level_id' => $additionalData['risk_level_id'], 
            'invested_amount' => $additionalData['invested_amount'],
            'expected_return_rate' => $additionalData['expected_return_rate'],
            'current_value'=> $additionalData['current_value'],
        ]);


        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];    }
}