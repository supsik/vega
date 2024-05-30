<?php

return [
    "code_length" => 4,
    "limit_send_count" => 3,
    "next_send_after" => 60,
    "expire_seconds" => 240,

    "sms_service" => [
        "class" => \App\Services\Sms\SmsServiceAero::class,
        "settings" => [],
    ]
];
