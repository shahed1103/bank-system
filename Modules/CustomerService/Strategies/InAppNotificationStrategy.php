<?php

namespace Modules\CustomerService\Strategies;

use App\Models\User;
use Modules\CustomerService\Models\InAppNotification;
use Modules\CustomerService\Strategies\NotificationStrategy;

class InAppNotificationStrategy implements NotificationStrategy
{
    public function send(User $user, string $type, array $data): void
    {
    // $request->validate([
    //     'user_id' => 'required|exists:users,id',
    //     'type' => 'required|string',
    //     'data' => 'required|string',
    // ]);

    $user = \App\Models\User::find($user->id);
    $fcm = $user->fcm_token;

    // if (!$fcm) {
    //     return response()->json(['message' => 'User does not have a device token'], 400);
    // }

    $title = $type;
    $description = $data;

    // -----------------------------
    \App\Models\InAppNotification::create([
            'user_id' => $user->id,
            'type'    => $title,
            'data'    => $description,
            'is_read' => false,
    ]);
    // -----------------------------

    $projectId = env('FCM_PROJECT_ID');
    $credentialsFilePath = storage_path('app/json/bank-system-57c41-firebase-adminsdk-fbsvc-1da26af36e.json');

    $client = new GoogleClient();
    $client->setAuthConfig($credentialsFilePath);
    $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    $client->refreshTokenWithAssertion();
    $token = $client->getAccessToken();

    $access_token = $token['access_token'];

    $headers = [
        "Authorization: Bearer $access_token",
        'Content-Type: application/json'
    ];

    $data = [
        "message" => [
            "token" => $fcm,
            "notification" => [
                "title" => $title,
                "body" => $description,
            ],
        ]
    ];
    $payload = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    // if ($err) {
    //     return response()->json([
    //         'message' => 'Curl Error: ' . $err
    //     ], 500);
    // } else {
    //         return response()->json([
    //             'message' => 'Notification has been sent and stored',
    //             'response' => json_decode($response, true)
    //         ]);
    //     }
    }
}
