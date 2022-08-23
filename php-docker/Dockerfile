FROM php:8.0.2-fpm-alpine

RUN mkdir -p /webapp/storage

RUN chown -R $(whoami):www-data /webapp/storage && chmod -R ug+w /webapp/storage
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apk add --no-cache zip libzip-dev libpng-dev
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd
