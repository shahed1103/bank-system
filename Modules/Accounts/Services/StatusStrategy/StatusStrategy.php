<?php
namespace Modules\Accounts\Services\StatusStrategy;
use Modules\Accounts\Entities\Account;
use Modules\Accounts\Entities\AccountStatus;
use Modules\Accounts\Services\StatusStrategy\Status\{
    ActiveService,
    ClosedService,
    FrozenService,
    SuspendedService
};


class StatusStrategy
{


        public function freezeFac(int $accountId, $request) :array {
        $account = Account::find($accountId);
        $status = AccountStatus::findOrFail($account->account_status_id)->name;

        return match($status) {
            'active'  => ActiveService :: freeze($account, $request) ,
            'closed' =>  ClosedService:: freeze($account, $request) ,
            'frozen' =>  FrozenService:: freeze($account, $request) ,
            'suspended' => SuspendedService:: freeze($account, $request) ,
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function activateFac(int $accountId): array {
        $account = Account::find($accountId);
        $status = AccountStatus::findOrFail($account->account_status_id)->name;

        return match($status) {
            'active'  => ActiveService :: activate($account) ,
            'closed' =>  ClosedService:: activate($account) ,
            'frozen' =>  FrozenService:: activate($account) ,
            'suspended' =>  SuspendedService:: activate($account) ,
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function closedFac(int $accountId, $request):array {
         $account = Account::find($accountId);
        $status = AccountStatus::findOrFail($account->account_status_id)->name;

        return match($status) {
           'active'  => ActiveService :: closed($account, $request) ,
            'closed' =>  ClosedService:: closed($account , $request) ,
            'frozen' =>  FrozenService:: closed($account , $request) ,
            'suspended' =>  SuspendedService:: closed($account, $request) ,
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

        public function suspendFac(int $accountId, $request):array {
      $account = Account::find($accountId);
        $status = AccountStatus::findOrFail($account->account_status_id)->name;

        return match($status) {
           'active'  => ActiveService :: suspend($account, $request) ,
            'closed' =>  ClosedService:: suspend($account, $request) ,
            'frozen' =>  FrozenService:: suspend($account, $request) ,
            'suspended' =>  SuspendedService:: suspend($account, $request) ,
            default => throw new Exception("Invalid account status: $status", 400),
        };
    }

}
