<?php

namespace App\Actions;


use Illuminate\Support\Facades\Http;

class SendSmsAction
{
    public function run(string $phone, $message): bool
    {
        $email = env('SMS_EMAIL');
        $apiKey = env('SMS_API_KEY');
        $url = "https://{$email}:{$apiKey}@gate.smsaero.ru/v2/sms/send";
        $sign = 'Clinic MEGA';

        $response = Http::withHeaders(['accept' => 'application/json'])
            ->get($url, [
                'number' => $phone,
                'text' => $message,
                'sign' => $sign,
            ]);

        return $response->json('success');
    }
}
