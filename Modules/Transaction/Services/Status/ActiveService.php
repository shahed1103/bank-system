<?php

namespace Modules\Transaction\Services\Status;

use Modules\Accounts\Entities\CheckingAccount;
use Modules\Accounts\Services\Account\TransitionInterface;
use Modules\Accounts\Entities\CheckingAccountDetails;
use Modules\Accounts\Entities\Account;

// public function withdraw(): array;    //سحب
// public function deposit(): array;     //ايداع
// public function transfer(): array;     //تحويل
// public function freeze(): array;
// public function activate(): array;
// public function closed(): array;
// public function suspend(): array;

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


