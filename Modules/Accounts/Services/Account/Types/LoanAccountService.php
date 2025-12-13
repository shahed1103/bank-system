<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\LoanAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Contracts\AccountTypeInterface;

class LoanAccountService extends BaseAccountService implements AccountTypeInterface
{
    public function create($data): array{
        $additionalData = $data->input('additional_data', []);

        $account = $this->createBaseAccount($data);

        LoanAccount::create([
            'account_id' => $account->id,
            'loan_amount' => $additionalData['loan_amount'],
            'interest_rate' => $additionalData['interest_rate'],
            'term_months' => $additionalData['term_months'],
            'monthly_payment' => $additionalData['monthly_payment'],
            'start_date' => $additionalData['start_date'],
            'end_date' => $additionalData['end_date'],
            'remaining_balance' => $additionalData['remaining_balance'],
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];    
    }
}
