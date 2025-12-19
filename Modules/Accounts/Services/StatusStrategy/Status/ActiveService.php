<?php

namespace Modules\Account\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;
use Modules\Accounts\Entities\Account;

// public function freeze(): array;
// public function activate(): array;
// public function closed(): array;
// public function suspend(): array;

class ActiveService  implements TransitionInterface
{


public function freeze($account , $request):array {

    $account->account_status_id = 2;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  freeze successfuly';
    return ['account' => $account  , 'message' => $message];
}


public function activate($account):array {
$account->account_status_id = 1;

$message = 'this Account  return active successfuly';
return ['account' => $account  , 'message' => $message];
}


//////////////////////////////////////////mustshahedEdit
public function closed($account , $request):array {

    // $account->account_status_id = 4;

    $close = $account->close();

    $account->status_resion = $request['status_resion'];

    $message = 'this Account  closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

public function suspend($account , $request):array {
    $account->account_status_id = 3;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  suspended successfuly';
    return ['account' => $account  , 'message' => $message];
}


}


