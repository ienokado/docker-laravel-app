<?php
return [
    'sns_share_url' => [
        'facebook' => env('FACEBOOK_SHARE_URL', 'https://www.facebook.com/sharer/sharer.php?u='). env('APP_URL'),
        'twitter' => env('TWITTER_SHARE_URL', 'http://twitter.com/share?url='). env('APP_URL'),
        'line' => env('LINE_SHARE_URL', 'http://line.me/R/msg/text/?'),
    ],
    'cookie_expire' => [
        'disp_count' => 60*60*24*30,
    ],
    'request_logger' => [
        'environment' => [
            'local',
            'development',
            'production',
        ],
    ],
    'ranking' => [
        'count' => 10,
    ]
];
