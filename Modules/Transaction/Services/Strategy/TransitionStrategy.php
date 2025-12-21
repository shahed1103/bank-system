<?php

namespace Modules\Transaction\Services\Strategy;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Modules\Accounts\Entities\AccountStatus;
use Modules\Transaction\Services\Strategy\TransitionInterface;
use Modules\Transaction\Services\Status\{
    ActiveService,
    ClosedService,
    FrozenService,
    SuspendedService
};

class TransitionStrategy
{
    public function withdrawStr($accountStatusId): TransitionInterface{
     $status = AccountStatus::findOrFail($accountStatusId)->name;
   echo($status);
        return match($status) {
            'active' => new ActiveService (),
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }


        public function depositStr(int $accountStatusId): TransitionInterface{
        $status = AccountStatus::findOrFail($accountStatusId)->name;

        return match($status) {
            'active' => new ActiveService(),
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function transferStr(int $accountStatusId): TransitionInterface{
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
