<?php

namespace Modules\Transaction\Services\Types;

use Modules\Transaction\Services\Strategy\TransitionInterface;
use Throwable;
use Modules\Accounts\Services\Account\Types\CheckingAccountService;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Modules\Accounts\Entities\CheckingAccountDetails;

    class CheckingService
{

//////////////////////////////////can
public static function withdraw($account , $request, $transition):array {

$checking = CheckingAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = CheckingAccountService::getOwnBalance($account);
echo($oldBalance);
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
public static function  deposit($account , $request ):array {

$checking = CheckingAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = CheckingAccountService::getOwnBalance($account);

   $checking-> update([
    'balance' => ($oldBalance + $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
    return ['message' => $message];
}



//////////////////////////////can
public static function  transfer($account , $request , $transfer):array {

$send_checking = CheckingAccountDetails:: where ('account_id' , $account->id)->get();
$old_sendBalance = CheckingAccountService::getOwnBalance($account);

if($request['amount'] > $old_sendBalance ) {
    $transfer -> delete();
     $message = "you cant transfer because the amount bigger than your balance";
    return ['message' => $message];

}

   $send_checking-> update([
    'balance' => ($old_sendBalance - $request['amount'])
   ]);

$recive_checking = CheckingAccountDetails:: where ('account_id' , $request['recive_account_id'])->get();
$old_reciveBalance = CheckingAccountService::getOwnBalance($account);

   $recive_checking-> update([
    'balance' => ($old_reciveBalance + $request['amount'])
   ]);


    $message = "your transfer completed successfuly";
    return ['message' => $message];
}
}
