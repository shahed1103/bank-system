<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\LoanAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;
use Modules\Accounts\Entities\LoanDetails;

class LoanAccountService extends BaseAccountService implements AccountInterface
{
    protected function resolveAccountStatus(): int{
        return 5; //non Active
    }

    public function create($request , $userId): array{
        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request , $userId);
        $loanAccount = LoanAccount::where('year_version', now()->year)
            ->firstOrFail();

        LoanDetails::create([
            'account_id' => $account->id,
            'loan_id' => $loanAccount->id,
            'requested_principal_amount' => $additionalData['requested_principal_amount'],
            // 'approved_principal_amount' =>,
            // 'remaining_principal' =>,
            'interest_rate_at_disbursement' =>  $loanAccount->interest_rate,
            'requested_term_months' => $additionalData['requested_term_months'],
            // 'approved_date' =>,
            // 'next_payment_date' =>,
            // 'monthly_payment_amount' =>,
            // 'rejected_resion' =>,
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];    
    }
}
