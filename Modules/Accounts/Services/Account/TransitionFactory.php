<?php

namespace Modules\Accounts\Services\Account;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;
use Modules\Accounts\Entities\AccountStatus;
use Modules\Accounts\Services\Account\Status\{
    ActiveService,
    ClosedService,
    FrozenService,
    SuspendedService
};

class TransitionFactory
{
    public function withdrawFac(int $accountStatusId): TransitionInterface{
        $status = AccountStatus::findOrFail($accountStatusId)->name;

        return match($status) {
            'active' => new ActiveService(),
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

        public function freezeFac(int $accountStatusId): TransitionInterface{
        $status = AccountStatus::findOrFail($accountStatusId)->name;

        return match($status) {
            'active' => new ActiveService(),
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function activateFac(int $accountStatusId): TransitionInterface{
        $status = AccountStatus::findOrFail($accountStatusId)->name;

        return match($status) {
            'active' => new ActiveService(),
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function closedFac(int $accountStatusId): TransitionInterface{
        $status = AccountStatus::findOrFail($accountStatusId)->name;

        return match($status) {
            'active' => new ActiveService(),
            'closed' => new ClosedService(),
            'frozen' => new FrozenService(),
            'suspended' => new SuspendedService(),
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function suspendFac(int $accountStatusId): TransitionInterface{
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
