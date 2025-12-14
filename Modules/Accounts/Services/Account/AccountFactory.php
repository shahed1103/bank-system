<?php

namespace Modules\Accounts\Services\Account;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Modules\Accounts\Entities\AccountType;
use Modules\Accounts\Services\Account\Types\{
    SavingsAccountService,
    CheckingAccountService,
    LoanAccountService,
    InvestmentAccountService
};

class AccountFactory
{
    public function make(int $accountTypeId): AccountCreation{
        $type = AccountType::findOrFail($accountTypeId)->name;

        return match($type) {
            'savings' => new SavingsAccountService(),
            'checking' => new CheckingAccountService(),
            'loan' => new LoanAccountService(),
            'investment' => new InvestmentAccountService(),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }
}
