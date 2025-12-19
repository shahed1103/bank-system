<?php

namespace Modules\CustomerService\Listeners;
use Modules\CustomerService\Services\NotificationService;
use Modules\CustomerService\Events\AccountActivityOccurred;

class SendAccountNotification
{
    public function handle(AccountActivityOccurred $event): void
    {
        app(NotificationService::class)
            ->notify($event->user, $event->type, $event->data);
    }
}
