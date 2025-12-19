<?php

namespace Modules\Account\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;


class FrozenService  implements TransitionInterface


{

public function freeze($account , $request):array {

    $message = 'this Account is already frozen';
    return ['message' => $message];
}


public function activate($account):array {
    $message = 'this Account is already active';
    return ['message' => $message];
}

//////////////////////////////////////////mustshahedEdit
public function closed($account , $request):array {

    $account->account_status_id = 4;
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
