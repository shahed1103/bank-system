<?php

namespace Modules\Accounts\Services\Account\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;

// public function withdraw(): array;    //سحب
// public function deposit(): array;     //ايداع
// public function transfer(): array;     //تحويل
// public function freeze(): array;
// public function activate(): array;
// public function closed(): array;
// public function suspend(): array;

class ActiveService  implements TransitionInterface
{






public function freeze($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 2;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  closed successfuly';
    return ['account' => $account  , 'message' => $message];
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


