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

class SavingsAccountService  implements TransitionInterface
{



//////////////////////////////////can
public function withdraw($account  , $request):array {

}


//////////////////////////////////can
public function deposit($account  , $request):array {

}


public function transfer($account , $request):array {
$message = "you cant transfer because this account a SavingsAccount ";
return [ 'message' => $message];
}
}
