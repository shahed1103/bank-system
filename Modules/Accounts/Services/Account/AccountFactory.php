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
    public static function create($request)
    {
        $accountType = AccountType::find($request->input('account_type_id'));

        return match($accountType->name) {
            'savings' => (new SavingsAccountService())->create($request),
            'checking' => (new CheckingAccountService())->create($request),
            'loan' => (new LoanAccountService())->create($request),
            'investment' => (new InvestmentAccountService())->create($request),
            default => throw new Exception("Invalid account type: $request->account_type", 400),
        };
    }
}
