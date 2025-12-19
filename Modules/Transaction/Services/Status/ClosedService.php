<?php

namespace Modules\Transaction\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;
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


}
