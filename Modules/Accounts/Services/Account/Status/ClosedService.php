<?php

namespace Modules\Accounts\Services\Account\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;


class ClosedService  implements TransitionInterface
{









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
