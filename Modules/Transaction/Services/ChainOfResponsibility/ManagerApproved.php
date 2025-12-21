<?php

namespace Modules\Transaction\Services\ChainOfResponsibility;

class ManagerApproved  implements TransitionHandlerInterface
{

public static function handelWithdraw($account , $request): array{
        $transition = Transition::create([
        'account_id' => $account->id,
        'type' => 'withdraw' ,
        'amount' => $request['amount'],
        'approv'=> 'false'
 ]);

     $message = "this withdraw need admin approv befer comleted please wait
      for recive notefication";
    return ['message' => $message];
}

public static function handelDeposit($account , $request): array{
        $transition = Transition::create([
        'account_id' => $account->id,
        'type' => 'deposit' ,
        'amount' => $request['amount'],
        'approv'=> 'false'
 ]);
     $message = "this withdraw need admin approv befer comleted please wait
      for recive notefication";
    return ['message' => $message];
}

public static function handelTransfer($account , $request): array{
        $transfer = Trasfer::create([
       'send_account_id' => $account->id,
       'recive_account_id' => $request ['recive_account_id'],
        'amount' => $request['amount'],
        'approv'=> 'false'

 ]);
     $message = "this withdraw need admin approv befer comleted please wait
      for recive notefication";
    return ['message' => $message];
}

    }


