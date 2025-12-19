<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;

use Modules\Accounts\Entities\CheckingAccountDetails;

    class CheckingAccountService  implements TransitionInterface
{

//////////////////////////////////can
public function withdraw($account , $request, $transition):array {

$checking = CheckingAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = CheckingAccountDetails::getOwnBalance();

if($request['amount'] > $oldBalance ) {
    $transition -> delete();
     $message = "you cant withdraw because the amount bigger than your balance";
    return ['message' => $message];

}
   $checking-> update([
    'balance' => ($oldBalance - $request['amount'])
   ]);

    $message = "your withdraw completed successfuly";
    return ['message' => $message];

}


//////////////////////////////////can
public function deposit($account , $request ):array {

$checking = CheckingAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = CheckingAccountDetails::getOwnBalance();

   $checking-> update([
    'balance' => ($oldBalance + $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
    return ['message' => $message];
}



//////////////////////////////can
public function transfer($account , $request):array {

}
}
