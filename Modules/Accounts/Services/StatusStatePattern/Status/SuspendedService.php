<?php

namespace Modules\Accounts\Services\StatusStatePattern\Status;

use Modules\Accounts\Services\StatusStrategy\ChangeStatusInterface;


class SuspendService  implements ChangeStatusInterface
{


 public static function freeze($account , $request):array {
    $account->update(['account_status_id' => 2,
         'status_resion' => $request['status_resion'] ]);
    $account->save();
    $message = 'this Account freeze successfuly';
    return ['account' => $account  , 'message' => $message];
}


 public static function activate($account):array {
    $account->update(['account_status_id' =>1 ]);
    $account->save();
$message = 'this Account return active successfuly';
return ['account' => $account  , 'message' => $message];
}

//////////////////////////////////////////mustshahedEdit
 public static function closed($account, $request):array {

    // $account->account_status_id = 4;
    $close = $account->close();

    $account->status_resion = $request['status_resion'];

    $message = 'this Account closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

 public static  function suspend($account , $request):array {

    $message = 'this Account is already suspended';
    return ['message' => $message];
}

}
