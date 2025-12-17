<?php

namespace Modules\Accounts\Services\Account\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;


class FrozenService  implements TransitionInterface
{


public function freeze($accountId , $request):array {

    $message = 'this Account is already frozen';
    return ['message' => $message];
}


public function activate($accountId):array {
    $message = 'this Account is already active';
    return ['message' => $message];
}

public function closed($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 4;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

public function suspend($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 3;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  suspended successfuly';
    return ['account' => $account  , 'message' => $message];
}
}
