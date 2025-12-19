<?php

namespace Modules\CustomerService\Strategies;
use Modules\CustomerService\Strategies\NotificationStrategy;
use App\Models\User;
use Modules\CustomerService\Services\NotificationService;

class SmsNotificationStrategy implements NotificationStrategy
{
    public function send(User $user, string $type, array $data): void
    {
        $subject = app(NotificationService::class)->resolveSubject($type);
        $body    = app(NotificationService::class)->resolveMessage($type, $data);

        $instance = env('ULTRA_MSG_INSTANCE');
        $token = env('ULTRA_MSG_TOKEN');

        $url = "https://api.ultramsg.com/instance151958/messages/chat";

        $client = new \GuzzleHttp\Client();

        $client->post($url, [
            'form_params' => [
                'token' => $token,
                'to' => $user->phone,          
                'body' => " $subject - $body",
            ]
        ]);
    }
}
