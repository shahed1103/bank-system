<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\SavingsAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\AccountInterface;

class SavingsAccountService extends BaseAccountService implements AccountInterface
{
    public function create($request): array{
        $additionalData = $request->input('additional_data', []);

        $account = $this->createBaseAccount($request);

        SavingAccount::create([
            'account_id' => $account->id,
            'interest_rate' => 2.5,
            'minimum_balance' => 100,
            'withdraw_limit_per_month' => 4,
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
}
