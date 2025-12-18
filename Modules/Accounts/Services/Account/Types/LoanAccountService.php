<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\LoanAccount;
use Modules\Accounts\Entities\Account;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;
use Modules\Accounts\Services\Account\ApproveRejectInterface;

use Modules\Accounts\Entities\LoanDetails;

class LoanAccountService extends BaseAccountService implements AccountInterface , ApproveRejectInterface
{
    protected function resolveAccountStatus(): int{
        return 5; //non Active
    }

    public function getOwnBalance(Account $account): float{
        return $account->loanDetails->balance ; 
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

    public function approve(Account $account): void{
        $details = LoanDetails::where('account_id', $account->id)
            ->firstOrFail();

        $details->update([
            'balance' => $details->requested_principal_amount,
            'remaining_principal' => $details->requested_principal_amount,
            'approved_date' => now(),
            'next_payment_date' => now()->addMonth(),
            'monthly_payment_amount' => $details->requested_term_months,
            'rejected_resion' => null,
        ]);

        $account->update([
            'account_status_id' => 1, // Active
        ]);
    }

    public function reject(Account $account, array $data): array{
        $details = LoanDetails::where('account_id', $account->id)
            ->firstOrFail();

        $details->update([
            'balance' => $data['approved_principal_amount'],
            'remaining_principal' =>  $data['approved_principal_amount'],
            'approved_date' => now(),
            'next_payment_date' => now()->addMonth(),
            'monthly_payment_amount' => $data['approved_principal_amount'],
            'rejected_resion' => $data['rejected_resion'],
        ]);

        $account->update([
            'account_status_id' => 5, // Non Active
        ]);
    }
}
