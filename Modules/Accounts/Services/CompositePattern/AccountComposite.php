<?php

namespace Modules\Accounts\Services\Account\CompositePattern;

class AccountComposite implements AccountComponent
{
    protected array $children = [];

    public function __construct(protected Account $account) {}

    public function add(AccountComponent $component): void
    {
        $this->children[] = $component;
    }

    public function getBalance(): float
    {
        $total = $this->account->balance;

        foreach ($this->children as $child) {
            $total += $child->getBalance();
        }

        return $total;
    }

    public function close(): void
    {
        foreach ($this->children as $child) {
            $child->close();
        }

        $this->account->update([
            'account_status_id' => AccountStatus::CLOSED
        ]);
    }
}
