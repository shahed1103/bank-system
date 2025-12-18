<?php

namespace Modules\Accounts\Services\Account\CompositePattern;

class AccountHierarchyService{
    public function build(int $parentAccountId): AccountComponent
    {
        $parent = Account::findOrFail($parentAccountId);

        $composite = new AccountComposite($parent);

        foreach ($parent->children as $childAccount) {
            $composite->add(new AccountLeaf($childAccount));
        }

        return $composite;
    }
}
