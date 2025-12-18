<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\InvestmentAccount;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\ApproveRejectInterface;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;
use Modules\Accounts\Entities\InvestmentDetails;


class InvestmentAccountService extends BaseAccountService implements AccountInterface , ApproveRejectInterface
{
    protected function resolveAccountStatus(): int{
        return 5; // non Active
    }


    public function getOwnBalance(Account $account): float{
        return $account->investmentDetails->balance ;
    }

    public function create($request , $userId): array{
        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request , $userId);
        $investmentAccount = InvestmentAccount::where('year_version', now()->year)
            ->firstOrFail();

        InvestmentDetails::create([
            'account_id' => $account->id,
            'investment_account_id' => $investmentAccount->id,
            'requested_investment_amount' => $additionalData['requested_investment_amount'],
            // 'approval_investment_amount'
            // 'rejected_rasion'
            'risk_level' => $additionalData['risk_level'],
            // 'approved_date'
        ]);


        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];
    }

    public function approve(Account $account): void{
        $details = InvestmentDetails::where('account_id', $account->id)
            ->firstOrFail();

        $details->update([
            'balance' => $details->requested_investment_amount,
            'approved_date' => now(),
            // 'rejected_rasion' => null,
        ]);

        $account->update([
            'account_status_id' => 1, // Active
        ]);
    }

    public function reject(Account $account, array $data): array{
        $details = InvestmentDetails::where('account_id', $account->id)
            ->firstOrFail();

        $details->update([
            'balance' => $data['approval_investment_amount'],
            'rejected_rasion' => $data['rejected_rasion'],
            'approved_date' => now(),
        ]);

        $account->update([
            'account_status_id' => 5, // Non Active
        ]);
    }

    public function close(Account $account): string{
        if (($account->investmentDetails->balance ?? 0) > 0) {
            throw new Exception(
                'Investment account must have zero cash balance before closure.'
            );
        }

        $account->update([
            'account_status_id' => 4
        ]);

    return $account;

    }




    //////////////////////////////////can
public function withdraw($accountId , $request):array {

}


//////////////////////////////////can
public function deposit($accountId , $request):array {

}

//////////////////////////////can
public function transfer($accountId , $request):array {

}
}
