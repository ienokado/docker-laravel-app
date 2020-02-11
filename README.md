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

### Insert Initial Data
```cmd
$ docker-compose exec app php artisan db:seed
```

### sniffer(コード整形)
```
 docker-compose run app composer sniffer
```
