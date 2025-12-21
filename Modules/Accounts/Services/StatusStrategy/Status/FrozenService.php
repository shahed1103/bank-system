<?php

namespace Modules\Accounts\Services\StatusStrategy\Status;
use Modules\Accounts\Services\StatusStrategy\ChangeStatusInterface;

class FrozenService  implements ChangeStatusInterface


{

 public static function freeze($account , $request):array {

    $message = 'this Account is already frozen';
    return ['message' => $message];
}


 public static function activate($account):array {
    $message = 'this Account is already active';
    return ['message' => $message];
}

//////////////////////////////////////////mustshahedEdit
 public static function closed($account , $request):array {

    $account->account_status_id = 4;
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
