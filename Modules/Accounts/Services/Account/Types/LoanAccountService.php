<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\LoanAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Contracts\AccountTypeInterface;

class LoanAccountService extends BaseAccountService implements AccountTypeInterface
{
    public function create(array $data)
    {
        $account = $this->createBaseAccount($data);

        LoanAccount::create([
            'account_id' => $account->id,
            'loan_amount' => $data['loan_amount'],
            'interest_rate' => $data['interest_rate'],
            'loan_duration_months' => $data['loan_duration_months'],
        ]);

        return $account;
    }
}
