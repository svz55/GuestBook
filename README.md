# Guest book

## При разворачивании проекта необходимо иметь установленный Docker и Docker-Compose.

1. Скопировать env: `cp envexample .env`
2. Собрать образы для контейнеров `docker-compose build`
3. Запустить контейнеры `docker-compose up -d`

## Storage link

```twig
php artisan storage:link
```

## DB Seed

```twig

php artisan migrate:refresh --force --seed

php artisan db:seed
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=CommentsTableSeeder
```

## php artisan

```twig

php artisan make:migration create_products_table --create=products
php artisan make:model Admin --migration --controller --resource
php artisan make:model Admin --all
php artisan make:model Admin -a
````
## PHPunit coverage-report
```
./vendor/bin/phpunit --coverage-html coverage-report
```
## Кеш
```twig
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
```
