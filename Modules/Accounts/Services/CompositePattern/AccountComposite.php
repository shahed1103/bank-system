<?php

namespace Modules\Accounts\Services\CompositePattern;
use Modules\Accounts\Entities\Account;

class AccountComposite implements AccountComponent
{
    protected array $children = [];

    public function __construct(protected Account $account) {}

    public function add(AccountComponent $component): void
    {
        $this->children[] = $component;
    }

    public function getBalance(): array{
        $total = $this->account->getOwnBalance();

        foreach ($this->children as $child) {
            $childBalance = $child->getBalance(); 
            $total += $childBalance['balance'];        
        }

    //      public function savingDetails(){
    //     return $this->hasOne(SavingAccountDetails::class);
    // }

    // public function checkingDetails(){
    //     return $this->hasOne(CheckingAccountDetails::class);
    // }

    // public function investmentDetails(){
    //     return $this->hasOne(InvestmentDetails::class);
    // }

    // public function loanDetails(){
    //     return $this->hasOne(LoanDetails::class);
    // }


        $message = 'Account hierarchy balance retrived successfully';
        return ['balance' => $total , 'message' => $message];
    }

    public function close(): array{
        foreach ($this->children as $child) {
            $child->close();
        }

        $this->account->update([
            'account_status_id' => AccountStatus::CLOSED
        ]);

        $message = 'Account hierarchy closed successfully';
        return ['close' => $this->account , 'message' => $message];
    }
}
