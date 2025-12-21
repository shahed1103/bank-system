<?php

namespace Modules\Administrative\Services;

use Modules\Accounts\Entities\Account;
use Modules\Administrative\Services\AccountFactory;
use Modules\Accounts\Services\Account\ApproveRejectInterface;
use Exception;
use Illuminate\Support\Carbon;
use Modules\CustomerService\Services\NotificationService;
use App\Models\User;
use Modules\Accounts\Entities\AccountStatus;
use Modules\CustomerService\Events\AccountActivityOccurred;
use Modules\Accounts\Services\StatusStrategy\StatusStrategy;

class ManagmentDashboardService
{

public function userCounts(): array {
    $users = User::with('role')->get();
    $data = [];
    foreach($users as $user) {
        $data[] = [
            'userRole'   => $user->role->name ?? 'No Role',
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'email'      => $user->email,
            'phone'      => $user->phone,
            'birth_date' => $user->birth_date
        ];
    }

    $message = 'Users retrieved successfully';
    return ['data' => $data, 'message' => $message];
}

public function accounts(): array {
    $accounts = Account::all();
    $data = [];
    foreach($accounts as $account) {
        $data[] = [
            'userName'   => $account->first_name ,
            'account_number' => $account->account_number,
            'account_name'  => $account->account_name,
            'currency'      => $account->currency,
            'opened_at'      => $account->opened_at,
            'closed_at' => $account->closed_at,
            'type' => $account->accountType->name,
            'status' => $account->accountStatus->name,
            'status_resion' => $account -> status_resion
        ];
    }

    $message = 'accounts retrieved successfully';
    return ['data' => $data, 'message' => $message];
}

public function numberOfFreezeAccounts(): array {
    $accounts = Account::where('status_account_id' , 2) -> count();

    $message = 'numberOfFreezeAccounts retrieved successfully';
    return ['count' => $accounts, 'message' => $message];
}


public function getDailyTransfers(): array
{
    $dailyTransfers = Transfer::with(['senderAccount', 'receiverAccount'])
        ->whereDate('created_at', now()->today())
        ->get();

    $data = [
        'count' => $dailyTransfers->count(),
        'total_amount' => $dailyTransfers->sum('amount'),
        'transfers' => $dailyTransfers
    ];

    return [
        'data' => $data,
        'message' => 'Daily transfers retrieved successfully'
    ];
}

public function getDailyTransition(): array
{
    $dailyTransitions = Transition::with(['account'])
        ->whereDate('created_at', now()->today())
        ->get();

    $data = [
        'count' => $dailyTransitions->count(),
        'total_amount' => $dailyTransitions->sum('amount'),
        'Transitions' => $dailyTransitions
    ];

    return [
        'data' => $data,
        'message' => 'Daily dailyTransitions retrieved successfully'
    ];
}


}
