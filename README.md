[![CircleCI](https://circleci.com/gh/ienokado/debayashi-koreyashi.svg?style=svg)](https://circleci.com/gh/ienokado/debayashi-koreyashi)
[![codecov](https://codecov.io/gh/ienokado/debayashi-koreyashi/branch/develop/graph/badge.svg)](https://codecov.io/gh/ienokado/debayashi-koreyashi)
[![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

# でばやし コレヤシ

## 概要
https://debayashi-koreyashi.work

でばやしコレヤシは芸人さんの出囃子を検索してシェアしたり、
SpotifyやApple Musicで視聴できるサービスです。

## 環境設定
### Git clone
```cmd
$ git clone https://github.com/ienokado/debayashi-koreyashi.git 
```
### Docker compose build & up
```cmd
$ cd debayashi-koreyashi
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:fresh
```
### Install Laravel using Composer
```cmd
$ composer install
$ docker-compose run node npm install
$ docker-compose run node npm run dev
```

http://localhost:10080

### Spotify API の設定
- [PHPライブラリ仕様](https://github.com/jwilsson/spotify-web-api-php)
```cmd
./src/.envへ追記

SPOTIFY_CLIENT_ID=XXXX
SPOTIFY_CLIENT_SECRET=XXXX
SPOTIFY_COUNTRY_CODE=JP
```

### Apple Music API の設定
- https://github.com/PouleR/apple-music-api
```cmd
.envへ追記

APPLE_TEAM_ID=XXX
APPLE_KEY_ID=XXXX
APPLE_AUTH_KEY_PATH=/path/to/AuthKey.p8
APPLE_COUNTRY_CODE=jp
```

### JWT設定
- https://github.com/tymondesigns/jwt-auth
```cmd
$ php artisan jwt:secret

※ 管理者アカウントのID/PASSでログイン可能
```

### Sentryの設定（エラー通知）
- [Sentry](https://sentry.io)
```cmd
.envへ追記

SENTRY_LARAVEL_DSN=https://XXXXXXX/XXXXX
```

### 芸人データのスクレイピング
```
$ php artisan command:comedian_groups_scraping
```

### Insert Initial Data
```cmd
$ php artisan db:seed
```

### tinker
```cmd
$ php artisan tinker
```

### sniffer(コード整形)
```
$ composer sniffer
```
