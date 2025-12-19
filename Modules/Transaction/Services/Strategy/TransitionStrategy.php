<?php

namespace Modules\Transaction\Services\Strategy;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Modules\Accounts\Entities\AccountStatus;
use Modules\Accounts\Services\Account\Status\{
    ActiveService,
    ClosedService,
    FrozenService,
    SuspendedService
};

class TransitionStrategy
{
    public function withdrawFac(int $accountId): TransitionInterface{

        $account = Account::find($accountId);
        $status = AccountStatus::findOrFail($account->account_status_id)->name;

        return match($status) {
            'active' => ActiveService :: activate($account) ,
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }


        public function depositFac(int $accountStatusId): TransitionInterface{
        $status = AccountStatus::findOrFail($accountStatusId)->name;

        return match($status) {
            'active' => new ActiveService(),
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function transferFac(int $accountStatusId): TransitionInterface{
        $status = AccountStatus::findOrFail($accountStatusId)->name;

        return match($status) {
            'active' => new ActiveService(),
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }



 }
