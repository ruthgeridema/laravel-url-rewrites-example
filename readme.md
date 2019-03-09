#Laravel URL rewrites example

```
git clone git@github.com:ruthgeridema/laravel-url-rewrites-example.git
```


## Docker
```
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