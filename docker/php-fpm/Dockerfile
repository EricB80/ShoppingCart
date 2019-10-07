FROM php:7.2-fpm

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y install libzip-dev zlib1g-dev git zip unzip libicu-dev g++ libbz2-dev  \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN docker-php-ext-configure zip --with-libzip && docker-php-ext-install mbstring pdo pdo_mysql zip bz2 intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer