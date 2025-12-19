<?php

namespace Modules\Transaction\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;
use Modules\Accounts\Entities\Account;

class ActiveService  implements TransitionInterface
{

public function withdraw($account , $request): array {
AutoApproved::handelWithdraw ($account , $request);
    }

public function deposit($account , $request): array {
AutoApproved::handelDeposit ($account , $request);
    }

public function transfer($account , $request) : array{
AutoApproved::handelTransfer ($account , $request);
    }



}


