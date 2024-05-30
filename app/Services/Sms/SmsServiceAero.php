<?php

namespace App\Services\Sms;

use App\Actions\SendSmsAction;

class SmsServiceAero implements SmsServiceInterface
{

    public function settings(array $settings): void
    {

    }

    public function send(string $phone, string $message): bool
    {
        return app(SendSmsAction::class)->run($phone, $message);
    }
}
