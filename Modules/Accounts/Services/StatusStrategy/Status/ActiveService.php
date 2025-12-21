<?php

namespace Modules\Accounts\Services\StatusStrategy\Status;
use Modules\Accounts\Services\StatusStrategy\ChangeStatusInterface;


class ActiveService  implements ChangeStatusInterface
{


 public static function freeze($account , $request):array {
 echo($request['status_resion']);

    $account->update(['account_status_id' => 2,
         'status_resion' => $request['status_resion'] ]);
    $account->save();

    $message = 'this Account  freeze successfuly';
    return ['account' => $account  , 'message' => $message];
}


 public static function activate($account):array {
$account->account_status_id = 1;

$message = 'this Account  return active successfuly';
return ['account' => $account  , 'message' => $message];
}


//////////////////////////////////////////mustshahedEdit
 public static function closed($account , $request):array {

    // $account->account_status_id = 4;

    $close = $account->close();

    $account->status_resion = $request['status_resion'];

    $message = 'this Account  closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

 public static function suspend($account , $request):array {
    $account->account_status_id = 3;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  suspended successfuly';
    return ['account' => $account  , 'message' => $message];
}


}


