<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\LoanAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;

class LoanAccountService extends BaseAccountService implements AccountInterface
{
    protected function resolveAccountStatus(): int{
        return 3; // Active
    }

    public function create($request , $userId): array{
        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request , $userId);

        LoanAccount::create([
            'account_id' => $account->id,
            // 'loan_amount' => $additionalData['loan_amount'],
            // 'interest_rate' => $additionalData['interest_rate'],
            // 'term_months' => $additionalData['term_months'],
            // 'monthly_payment' => $additionalData['monthly_payment'],
            // 'start_date' => $additionalData['start_date'],
            // 'end_date' => $additionalData['end_date'],
            // 'remaining_balance' => $additionalData['remaining_balance'],
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];    
    }
}
