<?php

namespace Modules\Accounts\Services\Admin;

use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\AccountFactory;
use Modules\Accounts\Services\Account\ApproveRejectInterface;



class AdminService
{
    public function approve($accountId): array{

        $account = Account::findOrFail($accountId);

        $service = app(AccountFactory::class)->make($account->account_type_id);

        if (! $service instanceof ApproveRejectInterface) {
            throw new Exception('This account type does not support approval');
        }

        $service->approve($account);
        $message = 'Account approved successfully';
        return ['account' => $account , 'message' => $message];  
    }

    public function reject(Account $account, array $data): void
    {
        $service = app(AccountFactory::class)->make($account->account_type_id);

        if (! $service instanceof ApproveRejectInterface) {
            throw new Exception('This account type does not support rejection');
        }

        $service->reject($account, $data);
    }
}
