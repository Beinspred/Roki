FROM php:7.3-fpm-alpine

RUN apk update; \
    apk upgrade;
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN adduser -u 1000 -D webmaster
USER webmaster
WORKDIR .

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN rm -f composer-setup.php

RUN mkdir ~/bin && mv composer.phar ~/bin/composer
ENV PATH="/home/webmaster/bin:${PATH}"
