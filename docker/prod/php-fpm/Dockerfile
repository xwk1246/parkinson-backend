FROM node:18-alpine AS node
WORKDIR /source
COPY . .
RUN yarn install
RUN yarn build

FROM php:8.1-fpm-alpine
WORKDIR /var/www/html
RUN apk update && apk add --no-cache \
    git \
    curl \
    zip \
    unzip \
    supervisor \
    libzip-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    tzdata

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install bcmath fileinfo gd zip mysqli pdo pdo_mysql exif

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --optimize-autoloader --no-dev
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache


COPY --from=node /source/public/build ./public/build
RUN chown -R www-data:www-data /var/www/html
