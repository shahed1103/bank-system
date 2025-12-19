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

public function withdraw($typeId): TransitionInterface{
$type = AccountType::findOrFail($typeId)->name;
         match($type) {
            'savings' => new SavingsAccountService(),
            'checking' => new CheckingAccountService(),
            'loan' =>  new LoanAccountService(),
            'investment' =>  new InvestmentAccountService(),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }

public function deposit($typeId): TransitionInterface{
        $type = AccountType::findOrFail($typeId)->name;

         match($type) {
               'savings' => new SavingsAccountService(),
            'checking' => new CheckingAccountService(),
            'loan' =>  new LoanAccountService(),
            'investment' =>  new InvestmentAccountService(),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }


public function transfer($typeId): TransitionInterface{
        $type = AccountType::findOrFail($typeId)->name;

         match($type) {
          'savings' => new SavingsAccountService(),
            'checking' => new CheckingAccountService(),
            'loan' =>  new LoanAccountService(),
            'investment' =>  new InvestmentAccountService(),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }




}


