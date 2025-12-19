<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\SavingsAccount;
use Modules\Accounts\Entities\SavingAccountDetails;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Entities\AccountStatus;
use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;

class SavingsAccountService 
{



//////////////////////////////////can
public function withdraw($accountId , $request):array {

}


//////////////////////////////////can
public function deposit($accountId , $request):array {

}


public function transfer($accountId , $request):array {
    $account = Account::findOrFail($accountId);

$message = "you cant transfer because this account a SavingsAccount ";
return [ 'message' => $message];
}
}
