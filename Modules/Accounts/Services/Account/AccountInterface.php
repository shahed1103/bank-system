<?php

namespace Modules\Accounts\Services\Account;

interface AccountInterface {
    public function create(array $data , int $userId): array;
    public function getOwnBalance(): float;
}


        // AccountType::SAVING     => $this->savingDetails->amount ?? 0,
        // AccountType::CHECKING   => $this->checkingDetails->amount ?? 0,
        // AccountType::LOAN       => -($this->loanDetails->amount ?? 0),
        // AccountType::INVESTMENT => $this->investmentDetails->amount ?? 0,
   
