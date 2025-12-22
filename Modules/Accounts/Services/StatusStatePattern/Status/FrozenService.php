<?php

namespace Modules\Accounts\Services\StatusStatePattern\Status;
use Modules\Accounts\Services\StatusStrategy\ChangeStatusInterface;

class FrozenService  implements ChangeStatusInterface


{

 public static function freeze($account , $request):array {

    $message = 'this Account is already frozen';
    return ['message' => $message];
}


 public static function activate($account):array {
    $message = 'you cant activate this account';
    return ['message' => $message];
}

//////////////////////////////////////////mustshahedEdit
 public static function closed($account , $request):array {

    $account->update(['account_status_id' => 4,
         'status_resion' => $request['status_resion'] ]);
    $account->save();
    $message = 'this Account  closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

 public static function suspend($account , $request):array {
    $account->update(['account_status_id' => 3,
         'status_resion' => $request['status_resion'] ]);
    $account->save();
    $message = 'this Account  suspended successfuly';
    return ['account' => $account  , 'message' => $message];
}
}
