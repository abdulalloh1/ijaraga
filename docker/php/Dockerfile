FROM php:8.3-fpm-alpine

RUN apk update && apk add --no-cache \
    git \
    curl \
    libpq-dev \
    zip \
    unzip \
    supervisor \
    && docker-php-ext-install pdo_pgsql bcmath

WORKDIR /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www

USER www-data

EXPOSE 9000