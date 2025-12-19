<?php

namespace Modules\CustomerService\Services;
use Modules\CustomerService\Events\AccountActivityOccurred;
use App\Models\User;
use Modules\CustomerService\Strategies\EmailNotificationStrategy;
use Modules\CustomerService\Strategies\SmsNotificationStrategy;
use Modules\CustomerService\Strategies\InAppNotificationStrategy;

use Modules\CustomerService\Strategies\NotificationStrategy;

class NotificationService
{
    public function notify(User $user, string $type, array $data): void
    {
        $strategy = $this->resolveStrategy($user, $type);
        $strategy->send($user, $type, $data);
    }

    protected function resolveStrategy(User $user, string $type): NotificationStrategy{

    if ($type === 'account_status_changed') {
        return new InAppNotificationStrategy();
    }

    return match ($user->preferred_channel) {
        'sms' => new SmsNotificationStrategy(),
        'email' => new EmailNotificationStrategy(),
        default => new InAppNotificationStrategy(),
    };
}

    public function resolveSubject(string $type): string{
        return match ($type) {
            'balance_changed'        => 'Balance Update',
            'large_transaction'     => 'Large Transaction Alert',
            'account_status_changed'=> 'Account Status Changed',
            default                 => 'Bank Notification',
        };
    }

    public function resolveMessage(string $type, array $data): string{
        return match ($type) {
            'balance_changed' =>
                "Your balance has changed.\nNew balance: {$data['new']}",

            'large_transaction' =>
                "A large transaction was detected.\nAmount: {$data['amount']}",

            'account_status_changed' =>
                "Your account status is now: {$data['account_status']}",

            default =>
                'You have a new notification.',
        };
    }

}
