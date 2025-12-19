<?php

namespace Modules\CustomerService\Strategies;
use Modules\CustomerService\Strategies\NotificationStrategy;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Modules\CustomerService\Services\NotificationService;

class EmailNotificationStrategy implements NotificationStrategy
{
    public function send(User $user, string $type, array $data): void
    {
            $subject = app(NotificationService::class)->resolveSubject($type);
            $body    = app(NotificationService::class)->resolveMessage($type, $data);

            Mail::raw($body, function ($message) use ($user , $subject) {
                $message->to($user->email)->subject($subject);
        });
    }

}
