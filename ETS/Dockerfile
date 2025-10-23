FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip \
    libonig-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock /var/www/html/
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

COPY . /var/www/html

RUN chmod -R 775 storage bootstrap/cache

ARG PORT=10000
ENV PORT=${PORT}

CMD php -S 0.0.0.0:${PORT} -t public
