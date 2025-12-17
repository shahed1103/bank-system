<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\InvestmentAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;
use Modules\Accounts\Entities\InvestmentDetails;


class InvestmentAccountService extends BaseAccountService implements AccountInterface
{

    protected function resolveAccountStatus(): int{
        return 5; // non Active
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
        return ['account' => $account , 'message' => $message];    }
}