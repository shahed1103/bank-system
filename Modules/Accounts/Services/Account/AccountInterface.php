<?php

namespace Modules\Accounts\Services\Account;

interface AccountInterface {
    public function create(array $data , int $userId): array;
    // public function update(array $data): array;
}
