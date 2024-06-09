<?php

use MoonShine\Exceptions\MoonShineNotFoundException;
use MoonShine\Models\MoonshineUser;

return [
    'dir' => 'app/MoonShine',
    'namespace' => 'App\MoonShine',

    'title' => env('MOONSHINE_TITLE', 'Панель управления'),
    'logo' => env('MOONSHINE_LOGO', '/images/logo-white.png'),
    'logo_small' => env('MOONSHINE_LOGO_SMALL', '/images/sm-logo.png'),

    'route' => [
        'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'admin'),
        'middleware' => ['web', 'moonshine'],
        'custom_page_slug' => 'custom_page',
        'notFoundHandler' => MoonShineNotFoundException::class
    ],

    'auth' => [
        'enable' => true,
        'guard' => 'moonshine',
        'guards' => [
            'moonshine' => [
                'driver' => 'session',
                'provider' => 'moonshine',
            ],
        ],
        'providers' => [
            'moonshine' => [
                'driver' => 'eloquent',
                'model' => MoonshineUser::class,
            ],
        ],
        'footer' => ''
    ],
    'locales' => [
        'ru'
    ],
    'middlewares' => [],
    'tinymce' => [
        'file_manager' => 'laravel-filemanager',
        'token' => env('MOONSHINE_TINYMCE_TOKEN', ''),
        'version' => env('MOONSHINE_TINYMCE_VERSION', '7'),
        'toolbar' => 'fullscreen undo redo | blocks | bold italic underline strikethrough | link image media table tabledelete hr  | align | numlist bullist indent outdent | emoticons charmap | removeformat | codesample | ltr rtl | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol | preview print visualblocks visualchars',
        'simple_toolbar' => 'fullscreen undo redo | blocks | bold italic underline strikethrough | link',
    ],
    'socialite' => [
        // 'driver' => 'path_to_image_for_button'
    ],
    'footer' => [
        'nav' => [
            '/' => 'Copyright Клиника VEGA, '.date('Y'),
        ],
    ]
];
