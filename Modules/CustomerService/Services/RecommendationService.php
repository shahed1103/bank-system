<?php

namespace Modules\CustomerService\Services;

use Modules\Accounts\Entities\Account;
use Modules\Transaction\Entities\Transition;
use Modules\Transaction\Entities\Transfer;
use Illuminate\Support\Facades\Auth;

class RecommendationService
{
    /**
     * Get personalized recommendations for an account
     */
    public function getRecommendations(): array
    {
        $user = Auth::user();

        $rootAccount = Account::where('user_id', $user->id)
            ->whereNull('parent_account_id')
            ->firstOrFail();        
            
        $accountIds = $this->getAllRelatedAccountIds($rootAccount);

        $recommendations = [];

        if ($this->needsSavingsAccount($accountIds)) {
            $recommendations[] = [
                'type' => 'savings',
                'message' => 'We recommend opening a savings account to better manage your spending and increase your savings.'
            ];
        }

        if ($this->isPotentialInvestor($accountIds)) {
            $recommendations[] = [
                'type' => 'investment',
                'message' => 'Based on your transaction patterns, you may benefit from investment opportunities.'
            ];
        }

        if ($this->isHighTransferUser($accountIds)) {
            $recommendations[] = [
                'type' => 'premium',
                'message' => 'You are eligible for a premium account with lower fees and higher transfer limits.'
            ];
        }

        if ($this->hasUncontrolledSpending($accountIds)) {
            $recommendations[] = [
                'type' => 'spending_control',
                'message' => 'We suggest setting spending limits to better control frequent withdrawals.'
            ];
        }
        $message = 'recommendations are retrived successfully';
        return ['recommendations' => $recommendations , 'message' => $message];
    }

protected function getAllRelatedAccountIds(Account $root): array
{
    return $root->children()
        ->pluck('id')
        ->push($root->id)
        ->toArray();
}


    
    // Rule 1: Needs savings account
     
    protected function needsSavingsAccount(array $accountIds): bool
    {
        $withdrawals = Transition::whereIn('account_id', $accountIds)
            ->where('type', 'withdraw')
            ->where('created_at', '>=', now()->subDays(30))
            ->sum('amount');

        $deposits = Transition::whereIn('account_id', $accountIds)
            ->where('type', 'deposit')
            ->where('created_at', '>=', now()->subDays(30))
            ->sum('amount');

        if ($deposits == 0) {
            return true;
        }

        return ($withdrawals / $deposits) > 0.8;
    }

    // Rule 2: Potential investor

    protected function isPotentialInvestor(array $accountIds): bool
    {
        $deposits = Transition::whereIn('account_id', $accountIds)
            ->where('type', 'deposit')
            ->where('created_at', '>=', now()->subMonths(3))
            ->sum('amount');

        $withdrawals = Transition::whereIn('account_id', $accountIds)
            ->where('type', 'withdraw')
            ->where('created_at', '>=', now()->subMonths(3))
            ->sum('amount');

        return $deposits >= (3 * $withdrawals) && $deposits > 1000;
    }

    // Rule 3: High transfer user

    protected function isHighTransferUser(array $accountIds): bool
    {
        $transfers = Transfer::whereIn('send_account_id', $accountIds)
            ->where('created_at', '>=', now()->subMonth());

        return $transfers->count() >= 5
            && $transfers->avg('amount') >= 500;
    }

    // Rule 4: Uncontrolled spending behavior
    
    protected function hasUncontrolledSpending(array $accountIds): bool
    {
        return Transition::whereIn('account_id', $accountIds)
            ->where('type', 'withdraw')
            ->where('amount', '<', 100)
            ->where('created_at', '>=', now()->subMonth())
            ->count() >= 10;
    }
}
