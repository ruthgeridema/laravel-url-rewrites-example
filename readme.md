# Laravel URL rewrites example

You can view a live demo at [https://laravel-url-rewrites.ide.ma/](https://laravel-url-rewrites.ide.ma/)

## Installation

```bash
git clone git@github.com:ruthgeridema/laravel-url-rewrites-example.git
```
Copy .env.example to .env and fill in your credentials

```bash
composer install
php artisan migrate
php artisan db:seed --class=CatalogSeeder
npm i
npm run watch
```

## Docker
```bash
chmod u+x setup.sh
./setup.sh
```
Or manually
```
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed --class=CatalogSeeder
```