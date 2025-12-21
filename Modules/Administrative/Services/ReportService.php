<?php

namespace Modules\Administrative\Services;
use Modules\Accounts\Entities\Account;
use Modules\Transaction\Entities\Transition;

class ReportService{
    //Daily Transactions Report
    public function dailyTransactions(): array{
        $transactionReport = Transition::whereDate('created_at', today())
            ->select('account_id', 'type', 'amount', 'created_at')
            ->get();
        $message = 'Daily transactions report are retrived successfully';
        return ['Transaction Report' => $transactionReport , 'message' => $message];
}
    //Account Summary Report
    public function accountSummary(): array{
        $accountSummary = Account::with('accountType', 'accountStatus')
                ->select('id', 'account_number', 'account_type_id', 'account_status_id')
                ->get();
        $message = 'Account summary report are retrived successfully';
        return ['Account Summary' => $accountSummary , 'message' => $message];
    }
}