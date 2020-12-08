FROM php:7.4-fpm-alpine
RUN apk add --no-cache bash
RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer
