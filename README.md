# mangosoft-hackaton

Инструкция по запуску проекта:

 - `bash setup.sh`

Необходимые инструменты для запуска проекта:

 - `docker`
 - `docker-compose`
 
 Развёрнутый проект можно просмотреть на `http://localhost`
 
 Postman:
 - [MANGOSOFT DOCS](https://www.postman.com/explore/template/15242/mangosoft-hackaton)
 
 Дизайн проекта: 
 - [MangoSoft Figma](https://www.figma.com/file/RkIf006nhh8yPIrLpQxOio/Untitled?node-id=556%3A759)
 
 Примечание
 - Если ты используешь Windows, то у тебе могут быть проблемы при деплое, если это так, 
 то закомментируй следующие строчки в api/Dockerfile:
 ````
    COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
    RUN chmod +x /usr/local/bin/docker-entrypoint
    
    ENTRYPOINT ["docker-entrypoint"]
````
 - Если отсутствует bash:
 ````
    docker-compose up -d --build
    cp api/.env.dev api/.env
    docker-compose exec php composer install
    docker-compose exec php php artisan key:generate
    docker-compose exec php php artisan migrate:fresh --seed
    docker-compose exec php php artisan secret:generate
    docker-compose exec php php artisan passport:keys
    docker-compose up -d --force-recreate
 ````