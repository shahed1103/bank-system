<?php

namespace Modules\Accounts\Services\Admin;

use Modules\Accounts\Entities\Account;
use Modules\Accounts\Services\Account\Factory\AccountFactory;
use Modules\Accounts\Services\Account\ApproveRejectInterface;
use Exception;
use Illuminate\Support\Carbon;
use Modules\CustomerService\Services\NotificationService;
use App\Models\User;
use Modules\Accounts\Entities\AccountStatus;
use Modules\CustomerService\Events\AccountActivityOccurred;
use Modules\Accounts\Services\StatusStrategy\StatusStrategy;

class AdminService
{
    public function __construct(private StatusStrategy $statusStrategy){
    $this->statusStrategy = $statusStrategy;
}

    public function approve($accountId): array{

        $account = Account::findOrFail($accountId);

        $service = app(AccountFactory::class)->make($account->account_type_id);

        if (! $service instanceof ApproveRejectInterface) {
            throw new Exception('This account type does not support approval');
        }

        $service->approve($account);
        $message = 'Account approved successfully';
        return ['account' => $account , 'message' => $message];
    }

    public function reject($accountId , $data): array{
        $account = Account::findOrFail($accountId);

        $service = app(AccountFactory::class)->make($account->account_type_id);

        if (! $service instanceof ApproveRejectInterface) {
            throw new Exception('This account type does not support rejection');
        }

        $service->reject($account, $data);
        $message = 'Account rejected successfully';
        return ['account' => $account , 'message' => $message];
    }


    public function updateChecnindSetting(Request $request, $id): array{
    $checking = CheckingAccount::findOrFail($id);
    $validatedData = $request->validate([
        'minimum_balance' => 'sometimes|numeric',
        'overdraft_limit' => 'sometimes|numeric',
        'overdraft_fees' => 'sometimes|numeric',
        'monthly_fees' => 'sometimes|numeric',
        'year_version'  => 'sometimes',
    ]);

    $checking->update($validatedData);
    $checking->year_version = now()->year;


        $message = 'checking updated successfully';
        return ['checking' => $checking , 'message' => $message];
    }

    public function updateLoanSetting(Request $request, $id): array{
    $loan = LoanAccount::findOrFail($id);
    $validatedData = $request->validate([
        'interest_rate' => 'sometimes|numeric',
        'interest_rate_type' => 'sometimes|numeric',
        'late_payment_fees' => 'sometimes|numeric',
        'processing_fees' => 'sometimes|numeric',
        'max_tenure_months' => 'sometimes|numeric',
        'min_loan_amount' => 'sometimes|numeric',
        'max_loan_amount' => 'sometimes|numeric',
    ]);

    $loan->update($validatedData);
    $loan->year_version = now()->year;

        $message = 'loan updated successfully';
        return ['loan' => $loan , 'message' => $message];
    }


    public function updateSavingsSetting(Request $request, $id): array{
    $saving = SavingsAccount::findOrFail($id);
    $validatedData = $request->validate([

        'interest_rate'  => 'sometimes|numeric',
        'minimumbalancefor_interest'  => 'sometimes|numeric',
        'freewithdrawlimitpermonth'  => 'sometimes|numeric',
        'withdrawfeeafter_limit'  => 'sometimes|numeric',
    ]);

    $saving->update($validatedData);
    $saving->year_version = now()->year;

        $message = 'saving updated successfully';
        return ['saving' => $saving , 'message' => $message];
    }


        public function updateInvesmentSetting(Request $request, $id): array{
    $invest = InvestmentAccount::findOrFail($id);
    $validatedData = $request->validate([
        'expected_returns'  => 'sometimes|numeric',
        'minimum_investment'  => 'sometimes|numeric',
        'managementfeespercentage'  => 'sometimes|numeric',

    ]);

    $invest->update($validatedData);
    $invest->year_version = now()->year;

        $message = 'invest updated successfully';
        return ['invest' => $invest , 'message' => $message];
    }



    /////////////////////////////////////////////


    public function activete($accountId): array{
        DB::beginTransaction();
        try{
        $retuenDate = [];
        $retuenDate = $this->statusStrategy->activateFac($accountId);
        
        $account = Account::find($accountId);

        app(NotificationService::class)->notifyAccountStatusChange($account);

        DB::commit();
        $message = 'Account Activeted successfully';

        return $retuenDate;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function freeze($accountId , $request): array{
        DB::beginTransaction();
        try{
        $retuenDate = [];
        $retuenDate = $this->statusStrategy->freezeFac($accountId);

        $account = Account::find($accountId);
        
        app(NotificationService::class)->notifyAccountStatusChange($account);

        DB::commit();
        $message = 'Account Activeted successfully';

        return $retuenDate;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }



    public function close($accountId , $request): array{
        DB::beginTransaction();
        try{
        $retuenDate = [];
        $retuenDate = $this->statusStrategy->closedFac($accountId);

        $account = Account::find($accountId);
        
        app(NotificationService::class)->notifyAccountStatusChange($account);

        DB::commit();
        $message = 'Account Activeted successfully';

        return $retuenDate;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


public function suspend($accountId , $request): array{
        DB::beginTransaction();
        try{
        $retuenDate = [];
        $retuenDate = $this->statusStrategy->suspendFac($accountId);

        $account = Account::find($accountId);
        
        app(NotificationService::class)->notifyAccountStatusChange($account);

        DB::commit();
        $message = 'Account Activeted successfully';

        return $retuenDate;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


}
