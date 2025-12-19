<?php

namespace Modules\Transaction\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;
use Modules\Accounts\Entities\Account;

// public function withdraw(): array;    //سحب
// public function deposit(): array;     //ايداع
// public function transfer(): array;     //تحويل
// public function freeze(): array;
// public function activate(): array;
// public function closed(): array;
// public function suspend(): array;

class ActiveService  implements TransitionInterface
{

public function withdraw($accountId , $request): void{

        $account = Account::findOrFail($accountId);
        $type = AccountType::findOrFail($account->type_id)->name;

         match($type) {
            'savings' => SavingsAccountService::withdraw($account , $request),
            'checking' => CheckingAccountService::withdraw($account , $request),
            'loan' =>  LoanAccountService::withdraw($account , $request),
            'investment' =>  InvestmentAccountService::withdraw($account , $request),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }

public function deposit($accountId , $request): void{

        $account = Account::findOrFail($accountId);
        $type = AccountType::findOrFail($account->type_id)->name;

         match($type) {
            'savings' => SavingsAccountService::deposit($account , $request),
            'checking' => CheckingAccountService::deposit($account , $request),
            'loan' =>  LoanAccountService::deposit($account , $request),
            'investment' =>  InvestmentAccountService::deposit($account , $request),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }


public function transfer($accountId , $request): void{

        $account = Account::findOrFail($accountId);
        $type = AccountType::findOrFail($account->type_id)->name;

         match($type) {
            'savings' => SavingsAccountService::transfer($account , $request),
            'checking' => CheckingAccountService::transfer($account , $request),
            'loan' =>  LoanAccountService::transfer($account , $request),
            'investment' =>  InvestmentAccountService::transfer($account , $request),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }




}


