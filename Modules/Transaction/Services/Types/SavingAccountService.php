<?php

namespace Modules\Transaction\Services\Types;


use Modules\Accounts\Entities\SavingAccountDetails;
use Modules\Accounts\Services\Account\Types\SavingsAccountService;

use Modules\Transaction\Services\Strategy\TransitionInterface;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;

class SavingAccountService
{



//////////////////////////////////can
public static function  withdraw($account  , $request , $transition):array {
$sav = SavingAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = SavingsAccountService::getOwnBalance($account);

if($request['amount'] > $oldBalance ) {
    $transition -> delete();
    $message = "you cant withdraw because the amount bigger than your balance";
      return ['account' =>  $account, 'message' => $message];

}

if ($request['amount'] < $oldBalance / 4 ) {
    $sav->update([
        'balance' => ($oldBalance - $request['amount'])
    ]);
    $message = "your withdraw completed successfully";
      return ['account' =>  $account, 'message' => $message];

}

$transition -> delete();
$message = "your cant withdraw this amount because you have savings account";
     return ['account' =>  $account, 'message' => $message];



}


//////////////////////////////////can
public static function  deposit($account  , $request):array {

$sav = SavingAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = SavingsAccountService::getOwnBalance($account);

   $sav-> update([
    'balance' => ($oldBalance + $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
     return ['account' =>  $account, 'message' => $message];


}


public static function  transfer($account , $request):array {
$message = "you cant transfer because this account a SavingsAccount ";
   return ['account' =>  $account, 'message' => $message];

}
}
