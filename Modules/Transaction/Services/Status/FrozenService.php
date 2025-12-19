<?php

namespace Modules\Transaction\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;


class FrozenService  implements TransitionInterface
{
public function withdraw($accountId , $request):array {
        $account = Account::findOrFail($accountId);


$message = "you cant withdraw because this account was Frozen because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
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


public function transfer($accountId , $request):array {
 $account = Account::findOrFail($accountId);
$message = "you cant withdraw because this account was Frozen because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}


public function freeze($accountId , $request):array {

    $message = 'this Account is already frozen';
    return ['message' => $message];
}


public function activate($accountId):array {
    $message = 'this Account is already active';
    return ['message' => $message];
}

//////////////////////////////////////////mustshahedEdit
public function closed($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 4;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

public function suspend($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 3;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  suspended successfuly';
    return ['account' => $account  , 'message' => $message];
}
}
