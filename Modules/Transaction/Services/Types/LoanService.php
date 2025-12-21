<?php

namespace Modules\Transaction\Services\Types;


use Modules\Transaction\Services\Strategy\TransitionInterface;
use Throwable;
use Modules\Accounts\Services\Account\Types\LoanAccountService;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Modules\Accounts\Entities\LoanDetails;

class LoanService
{




public static function  withdraw($account , $request):array {

$message = "you cant withdraw because this account a LoanAccount ";
   return ['account' =>  $account, 'message' => $message];

}


//////////////////////////////////can
public static function  deposit($account , $request):array {

$loan = LoanDetails:: where ('account_id' , $account->id)->get();
$oldBalance = LoanAccountService::getOwnBalance($account);

   $loan-> update([
    'balance' => ($oldBalance - $request['amount'])
   ]);

    $message = "your deposit completed successfuly";
      return ['account' =>  $account, 'message' => $message];


}


public static function  transfer($account , $request):array {

$message = "you cant transfer because this account a LoanAccount ";
   return ['account' =>  $account, 'message' => $message];

}
}
