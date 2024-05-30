<?php

use App\Support\Flash\Flash;
use Carbon\Carbon;


if (!function_exists('isUpperCase')) {
    function isUpperCase($str)
    {
        return $str === mb_strtoupper($str, 'UTF-8');
    }
}

if (!function_exists('active_link')) {
    function active_link(string|array $names, string $class = 'active'): string|null
    {
        if (is_string($names)) {
            $names = [$names];
        }

        return Route::is($names) ? $class : null;
    }
}

if (!function_exists('__date')) {
    function __date(Carbon|string $date)
    {
        if (!$date instanceof Carbon) {
            $date = Carbon::make($date);
        }

        // return $date->format('d.m.Y');
        return $date->translatedFormat('j F Y');
    }
}

if (!function_exists('__dayOfWeek')) {
    function __dayOfWeek(string $date)
    {
        return Carbon::parse($date)->locale('ru')->isoFormat('dddd');
    }
}

if (!function_exists('__dayOfMonth')) {
    function __dayOfMonth(string $date)
    {
        return Carbon::parse($date)->locale('ru')->isoFormat('D MMMM');
    }
}

if (!function_exists('flash')) {
    function flash()
    {
        return app(Flash::class);
    }
}

if (!function_exists('price')) {
    function price($value)
    {
        is_null($value) ? $value = 0 : $value;
    
        return number_format($value, 0, ',', ' ')
            .' '.'₽';
    }
}

if (!function_exists('youtube_video_id')) {
    function youtube_video_id(string $url): string|null
    {
        $regex = '~
            ^(?:https?://)?                          # Optional protocol
            (?:www[.])?                              # Optional sub-domain
            (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
            ([^&]{11})                               # Video id of 11 characters as capture group 1
            ~x';

        preg_match($regex, $url, $matches);

        return $matches[1] ?? null;
    }
}

if (!function_exists('youtube_preview_url')) {
    function youtube_preview_url(string $url): string|null
    {
        $id = youtube_video_id($url);

        return "https://img.youtube.com/vi/{$id}/maxresdefault.jpg";
    }
}
//
//if (!function_exists('base64url_encode')) {
//    function base64url_encode($data) {
//        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
//    }
//}
//
//
//if (!function_exists('generateJwtToken')) {
//    function generateJwtToken($secret) {
//        $header = base64_encode('{
//    "typ": "JWT",
//    "alg": "HS512"
//  }');
//        $payload = base64_encode('{
//            "iss": "4d2cab54-3e2e-40fe-b162-fd09ffaab1f9",
//            "iat": '. time() .',
//            "exp": '. time() + 60 . '
//          }');
//        $signature = base64url_encode(hash_hmac('sha512', $header .'.'. $payload , $secret, true));
//        return $header .'.'. $payload .'.'. $signature;
//    }
//}





