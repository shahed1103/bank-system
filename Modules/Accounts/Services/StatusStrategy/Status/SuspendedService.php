<?php

namespace Modules\Account\Services\StatusStrategy\Status;

use Modules\Accounts\Services\StatusStrategy\ChangeStatusInterface;


class SuspendService  implements ChangeStatusInterface
{


public function freeze($account , $request):array {
    $account->account_status_id = 2;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account freeze successfuly';
    return ['account' => $account  , 'message' => $message];
}


public function activate($account):array {
$account->account_status_id = 1;

$message = 'this Account return active successfuly';
return ['account' => $account  , 'message' => $message];
}

//////////////////////////////////////////mustshahedEdit
public function closed($account, $request):array {

    // $account->account_status_id = 4;
    $close = $account->close();

    $account->status_resion = $request['status_resion'];

    $message = 'this Account closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

public function suspend($account , $request):array {

    $message = 'this Account is already suspended';
    return ['message' => $message];
}

}
