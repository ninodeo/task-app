FROM php:8.3-fpm

# Install PHP and system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    gnupg2 \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    build-essential \
    ca-certificates \
    netcat-openbsd \
    && docker-php-ext-install pdo_mysql zip

# Install Node.js 20.x
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy source code and entrypoint script
COPY ./src /var/www
COPY docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
