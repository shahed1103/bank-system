<?php

namespace Modules\Transaction\Services\Types;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Entities\Account;

use Modules\Accounts\Services\Account\BaseAccountService;
use Modules\Accounts\Services\Account\Factory\AccountInterface;

use Modules\Accounts\Entities\CheckingAccountDetails;

class CheckingAccountService  implements TransitionInterface
{

//////////////////////////////////can
public function withdraw($accountId , $request):array {

}


//////////////////////////////////can
public function deposit($accountId , $request):array {

}

//////////////////////////////can
public function transfer($accountId , $request):array {

}
}
