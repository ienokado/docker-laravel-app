# docker-laravel-app
### Git clone
```cmd
$ git clone https://github.com/ienokado/docker-laravel-app.git docker-larvel
```
### Docker compose build & up
```cmd
$ cd docker-laravel
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
### Add Pusher
Regist Pusher Account
https://pusher.com/
```.env
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1
```
## As necessary
### Running Testings
```cmd
$ docker-compose exec app ash -l
$ cp .env.example .env.testing
$ php artisan key:generate --env testing
$ sed -i -e 's/<php>/<php>\n        <env name="DB_HOST" value="db-testing" force="true"\/>/' phpunit.xml
$ ./vendor/bin/phpunit
```
### Send Test Mail
```cmd
$ docker-compose exec app php artisan tinker
Mail::raw('test mail',function($message){$message->to('test@example.com')->subject('test');});
```
http://127.0.0.1:18025
### MySQL connection
```cmd
$ docker-compose exec db bash -c 'mysql -u root -p ${MYSQL_PASSWORD} ${MYSQL_DATABASE}'
```
### Table Data Initialize
```cmd
$ docker-compose exec app php artisan migrate:fresh
$ docker-compose exec app php artisan db:seed
```
### Node(npm)
```cmd
$ docker-compose run node npm install
$ docker-compose run node npm run dev
```
### Node(yarn)
```cmd
$ docker-compose run node yarn
$ docker-compose run node yarn dev
```
### Redis for Laravel
```cmd
$ docker-compose exec app php artisan tinker
Redis::set('name', 'hoge');
Redis::get('name');
```
### Redis cli
```cmd
$ docker-compose exec redis redis-cli
```
### Add Login Auth Function
```cmd
$ docker-compose exec app composer require laravel/ui
$ docker-compose exec app php artisan ui vue --auth
$ docker-compose run node npm install
$ docker-compose run node npm run dev
```
### Clear database volume
```cmd
$ docker-compose down --volumes --rmi all
$ docker-compose up -d --build
$ docker-compose exec app php artisan migrate
```