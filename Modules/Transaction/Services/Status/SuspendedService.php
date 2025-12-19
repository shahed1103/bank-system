<?php

namespace Modules\Transaction\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;


class SuspendService  implements TransitionInterface
{


public function withdraw($accountId , $request):array {
 $account = Account::findOrFail($accountId);
$message = "you cant withdraw because this account was suspended because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}

public function deposit($accountId , $request):array {
 $account = Account::findOrFail($accountId);
$message = "you cant withdraw because this account was suspended because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}

public function transfer($accountId , $request):array {
 $account = Account::findOrFail($accountId);
$message = "you cant withdraw because this account was suspended because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}





}
