<?php

namespace Modules\Account\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;
// public function withdraw(): array;    //سحب
// public function deposit(): array;     //ايداع
// public function transfer(): array;

class ClosedService  implements TransitionInterface

{
public function freeze($account , $request):array {
$message = 'you cant complete because this account was closed';
return [ 'message' => $message];
}

public function activate($account):array {

    $account->account_status_id = 1;

    $message = 'this Account  return active successfuly';
    return ['account' => $account  , 'message' => $message];
}

public function closed($account, $request):array {
    $message = 'this Account is already closed';
    return ['message' => $message];
}

public function suspend($account , $request):array {
    $message = 'you cant complete because this account was closed';
    return [ 'message' => $message];
}


}
