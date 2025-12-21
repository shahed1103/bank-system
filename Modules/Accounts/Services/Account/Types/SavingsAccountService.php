<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\SavingsAccount;
use Modules\Accounts\Entities\SavingAccountDetails;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Entities\AccountStatus;
use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;

class SavingsAccountService extends BaseAccountService implements AccountInterface
{
    protected function resolveAccountStatus(): int{
        return 1; // Active
    }

    public static function getOwnBalance(Account $account): float{
        return $account->savingDetails->balance ;
    }

    public function create($request , $userId): array{
        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request , $userId);
        $savingsAccount = SavingsAccount::where('year_version', now()->year)
            ->firstOrFail();
        SavingAccountDetails::create([
            'account_id' => $account->id,
            // 'name' => $additionalData['name'],
            'savings_account_id'   => $savingsAccount->id,
            'currentinterestrate'  => $savingsAccount->interest_rate,
            'balance' => $additionalData['balance'],
        ]);
        $message = 'Account created successfully';
        return ['account' => $account , 'message' => $message];
    }

    public function update(array $data): array
    {
        $account = Account::findOrFail($data['account_id']);

        $this->updateBaseAccount($account, $data);

        if (isset($data['additional_data'])) {
            $account->savingsAccount->update($data['additional_data']);
        }

        return [
            'account' => $account->fresh(),
            'message' => 'Savings account updated successfully',
        ];
    }

    public function close(Account $account): string {
    if ($account->savingDetails->balance > 0) {
        throw new Exception('Savings account must be empty before closing.');
    }
    $account->update([
        'account_status_id' => 4
    ]);

    return $account;
}

}
