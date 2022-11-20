FROM php:8.1-fpm-alpine
WORKDIR /var/www/html

RUN apk update && apk add --no-cache \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    nodejs \
    yarn

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install bcmath fileinfo gd zip mysqli pdo pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN ls
# RUN composer install --no-scripts

# RUN chown -R www-data:www-data /var/www
