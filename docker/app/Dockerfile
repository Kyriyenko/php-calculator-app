FROM php:8.2-fpm

RUN apt-get update

#Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get install -y git curl

RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www