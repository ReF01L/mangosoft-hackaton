#!/bin/bash

docker-compose up -d --build

cp api/.env.dev api/.env

docker-compose exec php composer install

docker-compose exec php php artisan key:generate

docker-compose exec php php artisan migrate:fresh --seed

docker-compose exec php php artisan secret:generate

docker-compose exec php php artisan passport:keys

docker-compose up -d --force-recreate

echo 'Project is ready for testing!'