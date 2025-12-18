<?php

namespace Modules\Accounts\Services\Account\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;

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





public function freeze($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 2;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  freeze successfuly';
    return ['account' => $account  , 'message' => $message];
}


public function activate($accountId):array {
$account = Account::find($accountId);
$account->account_status_id = 1;

$message = 'this Account  return active successfuly';
return ['account' => $account  , 'message' => $message];
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


