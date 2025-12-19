<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\SavingsAccount;
use Modules\Accounts\Entities\SavingAccountDetails;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Entities\AccountStatus;
use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;

class SavingsAccountService  implements TransitionInterface
{



//////////////////////////////////can
public function withdraw($account  , $request , $transition):array {
$sav = SavingsAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = SavingsAccountDetails::getOwnBalance();

if($request['amount'] > $oldBalance ) {
    $transition -> delete();
    $message = "you cant withdraw because the amount bigger than your balance";
    return ['message' => $message];
}

if ($request['amount'] < $oldBalance / 4 ) {
    $sav->update([
        'balance' => ($oldBalance - $request['amount'])
    ]);
    $message = "your withdraw completed successfully";
    return ['message' => $message];
}

$transition -> delete();
$message = "your cant withdraw this amount because you have savings account";
    return ['message' => $message];


}


//////////////////////////////////can
public function deposit($account  , $request):array {

$sav = SavingsAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = SavingsAccountDetails::getOwnBalance();

   $sav-> update([
    'balance' => ($oldBalance + $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
    return ['message' => $message];

}


public function transfer($account , $request):array {
$message = "you cant transfer because this account a SavingsAccount ";
return [ 'message' => $message];
}
}
