<?php
return [
    'sns_share_url' => [
        'facebook' => env('FACEBOOK_SHARE_URL', 'https://www.facebook.com/sharer/sharer.php'),
        'twitter' => env('TWITTER_SHARE_URL', 'http://twitter.com/share'),
        'line' => env('LINE_SHARE_URL', 'http://line.me/R/msg/text/?'),
    ],
];
