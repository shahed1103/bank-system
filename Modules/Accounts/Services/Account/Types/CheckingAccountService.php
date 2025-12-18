<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;

use Modules\Accounts\Entities\CheckingAccountDetails;

class CheckingAccountService extends BaseAccountService implements AccountInterface
{
    protected function resolveAccountStatus(): int{
        return 1; // Active
    }

    public function getOwnBalance(Account $account): float{
        return $account->checkingDetails->balance ; 
    }
    
    public function create($request , $userId):array {

        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request , $userId);
        $checkingAccount = CheckingAccount::where('year_version', now()->year)
            ->firstOrFail();

        CheckingAccountDetails::create([
            'account_id' => $account->id,
            // 'name' => $additionalData['name'],
            'balance' => $additionalData['balance'],
            'checking_account_id'   => $checkingAccount->id,
            'allows_overdraft'   => $additionalData['allows_overdraft']
        ]);

        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];
    }
}
