<?php

namespace Modules\Accounts\Services\Account\Types;

use Modules\Accounts\Entities\CheckingAccount;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Contracts\AccountTypeInterface;

class CheckingAccountService extends BaseAccountService implements AccountTypeInterface
{
    public function create(array $data)
    {
        $account = $this->createBaseAccount($data);

        CheckingAccount::create([
            'account_id' => $account->id,
            'overdraft_limit' => $data['overdraft_limit'] ?? 0,
        ]);

        return $account;
    }
}