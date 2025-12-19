<?php

namespace Modules\CustomerService\Strategies;
use App\Models\User;

interface NotificationStrategy
{
    public function send(User $user, string $type, array $data): void;
}
