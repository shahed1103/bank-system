<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\InvestmentAccount;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\ApproveRejectInterface;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;
use Modules\Accounts\Entities\InvestmentDetails;


class InvestmentAccountService  implements TransitionInterface
{


    //////////////////////////////////can
public function withdraw($account , $request, $transition):array {

$invest = InvestementAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = InvestementAccountDetails::getOwnBalance();

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


$invest = InvestementAccountDetails:: where ('account_id' , $account->id)->get();
$oldBalance = InvestementAccountDetails::getOwnBalance();

   $invest-> update([
    'balance' => ($oldBalance + $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
    return ['message' => $message];
}


//////////////////////////////can
public function transfer($account , $request , $transfer):array {
$send_checking = CheckingAccountDetails:: where ('account_id' , $account->id)->get();
$old_sendBalance = CheckingAccountDetails::getOwnBalance();

if($request['amount'] > $old_sendBalance ) {
    $transfer -> delete();
     $message = "you cant transfer because the amount bigger than your balance";
    return ['message' => $message];

}

   $send_checking-> update([
    'balance' => ($old_sendBalance - $request['amount'])
   ]);

$recive_checking = CheckingAccountDetails:: where ('account_id' , $request['recive_account_id'])->get();
$old_reciveBalance = CheckingAccountDetails::getOwnBalance();

   $recive_checking-> update([
    'balance' => ($old_reciveBalance + $request['amount'])
   ]);


    $message = "your transfer completed successfuly";
    return ['message' => $message];

}
}
