#!/bin/bash

docker-compose up -d
docker-compose exec app php artisan migrate
