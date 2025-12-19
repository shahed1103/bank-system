<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\InvestmentDetails;
use Modules\Transaction\Services\Strategy\TransitionInterface;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;


class InvestmentAccountService  implements TransitionInterface
{


    //////////////////////////////////can
public function withdraw($account , $request, $transition):array {

$invest = InvestmentDetails:: where ('account_id' , $account->id)->get();
$oldBalance = InvestmentDetails::getOwnBalance();

if($request['amount'] > $oldBalance ) {
    $transition -> delete();
    $message = "you cant withdraw because the amount bigger than your balance";
    return ['message' => $message];
}

if ($request['amount'] < $oldBalance / 2 ) {
    $invest->update([
        'balance' => ($oldBalance - $request['amount'])
    ]);
    $message = "your withdraw completed successfully";
    return ['message' => $message];
}

$transition -> delete();
$message = "your cant withdraw this amount because you have investment account";
    return ['message' => $message];

}



//////////////////////////////////can
public function deposit($account , $request):array {


$invest = InvestmentDetails:: where ('account_id' , $account->id)->get();
$oldBalance = InvestmentDetails::getOwnBalance();

   $invest-> update([
    'balance' => ($oldBalance + $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
    return ['message' => $message];
}


//////////////////////////////can
public function transfer($account , $request , $transfer):array {
$send_checking = InvestmentDetails:: where ('account_id' , $account->id)->get();
$old_sendBalance = InvestmentDetails::getOwnBalance();

if($request['amount'] > $old_sendBalance ) {
    $transfer -> delete();
     $message = "you cant transfer because the amount bigger than your balance";
    return ['message' => $message];

}

   $send_checking-> update([
    'balance' => ($old_sendBalance - $request['amount'])
   ]);

$recive_checking = InvestmentDetails:: where ('account_id' , $request['recive_account_id'])->get();
$old_reciveBalance = InvestmentDetails::getOwnBalance();

   $recive_checking-> update([
    'balance' => ($old_reciveBalance + $request['amount'])
   ]);


    $message = "your transfer completed successfuly";
    return ['message' => $message];

}
}
