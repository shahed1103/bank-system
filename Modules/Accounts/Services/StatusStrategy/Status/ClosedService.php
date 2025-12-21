<?php

namespace Modules\Accounts\Services\StatusStrategy\Status;

use Modules\Accounts\Services\StatusStrategy\ChangeStatusInterface;

class ClosedService  implements ChangeStatusInterface

{
 public static function freeze($account , $request):array {
$message = 'you cant complete because this account was closed';
return [ 'message' => $message];
}

 public static function activate($account):array {

    $account->account_status_id = 1;

    $message = 'this Account  return active successfuly';
    return ['account' => $account  , 'message' => $message];
}

 public static function closed($account, $request):array {
    $message = 'this Account is already closed';
    return ['message' => $message];
}

 public static function suspend($account , $request):array {
    $message = 'you cant complete because this account was closed';
    return [ 'message' => $message];
}


}
