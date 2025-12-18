<?php

namespace Modules\Accounts\Services\CompositePattern;
use Modules\Accounts\Entities\Account;

class AccountHierarchyService{
    public function build(int $accountId): AccountComponent{
        $account = Account::with('children')->findOrFail($accountId);

        if ($account->children->isEmpty()) {
            return new AccountLeaf($account);
        }

        $composite = new AccountComposite($account);

        foreach ($account->children as $child) {
            $composite->add($this->build($child->id));
        }

        return $composite;
    }
}

