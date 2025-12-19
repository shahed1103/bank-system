<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\LoanAccount;
use Modules\Accounts\Entities\Account;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;
use Modules\Accounts\Services\Account\ApproveRejectInterface;

use Modules\Accounts\Entities\LoanDetails;

class LoanAccountService
{




public function withdraw($accountId , $request):array {
    $account = Account::findOrFail($accountId);

$message = "you cant withdraw because this account a LoanAccount ";
return [ 'message' => $message];
}


//////////////////////////////////can
public function deposit($accountId , $request):array {

}

public function transfer($accountId , $request):array {
    $account = Account::findOrFail($accountId);

$message = "you cant transfer because this account a LoanAccount ";
return [ 'message' => $message];
}
}
