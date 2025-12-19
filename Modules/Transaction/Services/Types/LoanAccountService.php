<?php

namespace Modules\Transaction\Services\Types;


use Modules\Transaction\Services\Strategy\TransitionInterface;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Modules\Accounts\Entities\LoanDetails;

class LoanAccountService  implements TransitionInterface
{




public function withdraw($account , $request):array {

$message = "you cant withdraw because this account a LoanAccount ";
return [ 'message' => $message];
}


//////////////////////////////////can
public function deposit($account , $request):array {

$loan = LoanDetails:: where ('account_id' , $account->id)->get();
$oldBalance = LoanDetails::getOwnBalance();

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
