# でばやし コレヤシ

## 概要
でばやしコレヤシは芸人さんの出囃子を検索するサービスです。

## 環境設定
### Git clone
```cmd
$ git clone https://github.com/ienokado/debayashi-koreyashi.git 
```
### Docker compose build & up
```cmd
$ cd debayashi-koreyashi
$ cp .env.sample .env
$ docker-compose up -d --build
$ cp ./src/.env.example ./src/.env
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan migrate:fresh
```
### Install Laravel using Composer
```cmd
$ docker-compose exec app composer install
$ docker-compose run node npm install
$ docker-compose run node npm run dev
```

http://localhost:10080

### Spotify API の設定
- [PHPライブラリ仕様](https://github.com/jwilsson/spotify-web-api-php)
```cmd
.envへ追記

SPOTIFY_CLIENT_ID=XXXX
SPOTIFY_CLIENT_SECRET=XXXX
SPOTIFY_COUNTRY_CODE=JP
```

### Apple Music API の設定
- [PHPライブラリ仕様](https://github.com/PouleR/apple-music-api)
```cmd
.envへ追記

APPLE_TEAM_ID=XXX
APPLE_KEY_ID=XXXX
APPLE_AUTH_KEY_PATH=/path/to/AuthKey.p8
APPLE_COUNTRY_CODE=jp
```

### 芸人データのスクレイピング
```
$ docker-compose run app php artisan command:comedian_groups_scraping
```

### Insert Initial Data
```cmd
$ docker-compose exec app php artisan db:seed
```

### sniffer(コード整形)
```
$ docker-compose run app composer sniffer
```
