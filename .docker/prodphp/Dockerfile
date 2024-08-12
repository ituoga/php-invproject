FROM kolaente/laravel:8.2-octane-prod

# mix
RUN apt-get update \
  && apt-get install -y build-essential zlib1g-dev default-mysql-client curl gnupg procps vim git unzip libzip-dev libpq-dev \
  && docker-php-ext-install zip pdo_mysql pdo_pgsql pgsql

# intl
RUN apt-get install -y libicu-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl

RUN docker-php-ext-install bcmath

COPY . /laravel
WORKDIR /laravel

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer config --global process-timeout 3600
RUN composer global require "laravel/installer"

RUN composer require laravel/octane
RUN php artisan octane:install --server=swoole
RUN composer install

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g
RUN npm install yarn -g
RUN npm install 
RUN npm run build

RUN apt-get clean 
RUN rm -rf node_modules



ENTRYPOINT ["php", "artisan", "octane:start", "--port", "80", "--host", "0.0.0.0"]
