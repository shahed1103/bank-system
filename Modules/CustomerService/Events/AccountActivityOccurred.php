<?php

namespace Modules\CustomerService\Events;
use App\Models\User;

class AccountActivityOccurred
{
    public function __construct(
        public User $user,
        public string $type, 
        public array $data = []
    ) {}
}
