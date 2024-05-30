<?php

namespace App\Services\Sms;

interface SmsServiceInterface
{
    public function settings(array $settings) : void;

    public function send(string $phone, string $message) : bool;
}
