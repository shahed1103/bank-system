<?php

namespace Modules\Accounts\Services\Account\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;
// public function withdraw(): array;    //سحب
// public function deposit(): array;     //ايداع
// public function transfer(): array;

class ClosedService  implements TransitionInterface
{


public function withdraw($accountId , $request):array {
    $account = Account::findOrFail($accountId);

$message = "you cant withdraw because this account was closed because {$account->status_resion}";
return [ 'message' => $message];
}

public function deposit($accountId , $request):array {
    $account = Account::findOrFail($accountId);

$message = "you cant withdraw because this account was closed because {$account->status_resion}";
return [ 'message' => $message];
}

public function transfer($accountId , $request):array {
    $account = Account::findOrFail($accountId);

$message = "you cant withdraw because this account was closed because {$account->status_resion}";
return [ 'message' => $message];
}

public function freeze($accountId , $request):array {
$message = 'you cant complete because this account was closed';
return [ 'message' => $message];
}

public function activate($accountId):array {
   $account = Account::find($accountId);
    $account->account_status_id = 1;

    $message = 'this Account  return active successfuly';
    return ['account' => $account  , 'message' => $message];
}

public function closed($accountId):array {
    $message = 'this Account is already closed';
    return ['message' => $message];
}

public function suspend($accountId ):array {
    $message = 'you cant complete because this account was closed';
    return [ 'message' => $message];
}


}
