<?php
return [
    'sns_share_url' => [
        'facebook' => env('FACEBOOK_SHARE_URL', 'https://www.facebook.com/sharer/sharer.php?u='). env('APP_URL'),
        'twitter' => env('TWITTER_SHARE_URL', 'http://twitter.com/share?url='). env('APP_URL'),
        'line' => env('LINE_SHARE_URL', 'https://social-plugins.line.me/lineit/share?url='). env('APP_URL'),
    ],
];
