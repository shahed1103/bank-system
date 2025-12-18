<?php

namespace Modules\Accounts\Services\Account\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;


class SuspendService  implements TransitionInterface
{


public function withdraw($accountId , $request):array {
 $account = Account::findOrFail($accountId);
$message = "you cant withdraw because this account was suspended because {$account->raison} /
 waiting for return Active";
return [ 'message' => $message];
}

public function deposit($accountId , $request):array {
 $account = Account::findOrFail($accountId);
$message = "you cant withdraw because this account was suspended because {$account->raison} /
 waiting for return Active";
return [ 'message' => $message];
}

public function transfer($accountId , $request):array {
 $account = Account::findOrFail($accountId);
$message = "you cant withdraw because this account was suspended because {$account->raison} /
 waiting for return Active";
return [ 'message' => $message];
}




public function freeze($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 2;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account freeze successfuly';
    return ['account' => $account  , 'message' => $message];
}


public function activate($accountId):array {
$account = Account::find($accountId);
$account->account_status_id = 1;

$message = 'this Account return active successfuly';
return ['account' => $account  , 'message' => $message];
}

//////////////////////////////////////////mustshahedEdit
public function closed($accountId , $request):array {

    $account = Account::find($accountId);
    $account->account_status_id = 4;
    $account->status_resion = $request['status_resion'];

    $message = 'this Account  closed successfuly';
    return ['account' => $account  , 'message' => $message];
}

public function suspend($accountId , $request):array {

    $message = 'this Account is already suspended';
    return ['message' => $message];
}

}
