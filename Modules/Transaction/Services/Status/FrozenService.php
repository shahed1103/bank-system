<?php

namespace Modules\Transaction\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;


class FrozenService  implements TransitionInterface
{
public function withdraw($account , $request):array {
$message = "you cant withdraw because this account was Frozen because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}

public function deposit($account , $request): void{
        $type = AccountType::findOrFail($account->type_id)->name;

         match($type) {
            'savings' => SavingsAccountService::deposit($account , $request),
            'checking' => CheckingAccountService::deposit($account , $request),
            'loan' =>  LoanAccountService::deposit($account , $request),
            'investment' =>  InvestmentAccountService::deposit($account , $request),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }


public function transfer($account , $request):array {
$message = "you cant withdraw because this account was Frozen because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}



}
