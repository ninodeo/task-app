FROM php:8.3-fpm

# Install PHP dependencies + Node.js 20 via NodeSource
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    gnupg \
    ca-certificates \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && docker-php-ext-install pdo_mysql

# Verify Node and npm
RUN node -v && npm -v

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY ./src /var/www

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www

CMD ["php-fpm"]
