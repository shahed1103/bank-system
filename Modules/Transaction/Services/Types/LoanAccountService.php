<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\LoanAccount;
use Modules\Accounts\Entities\Account;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;
use Modules\Accounts\Services\Account\ApproveRejectInterface;

use Modules\Accounts\Entities\LoanDetails;

class LoanAccountService  implements TransitionInterface
{




public function withdraw($account , $request):array {

$message = "you cant withdraw because this account a LoanAccount ";
return [ 'message' => $message];
}


//////////////////////////////////can
public function deposit($account , $request):array {

$loan = LoanAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = LoanAccountDetails::getOwnBalance();

   $loan-> update([
    'balance' => ($oldBalance - $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
    return ['message' => $message];

}


public function transfer($account , $request):array {

$message = "you cant transfer because this account a LoanAccount ";
return [ 'message' => $message];
}
}
