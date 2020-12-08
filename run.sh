#!bin/bash

echo Uploading Application container
docker-compose up --build -d

echo Install dependencies Lumen
docker run --rm --interactive --tty -v $PWD/backend/api:/app composer install

echo Run migrations
docker exec -it phpdocker php /var/www/html/artisan migrate

echo Run tests
docker exec -it phpdocker bash -c "cd /var/www/html && ./vendor/bin/phpunit"
