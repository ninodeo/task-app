FROM php:8.3-fpm

# Install PHP dependencies + Node.js 20
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

# Set working directory
WORKDIR /var/www

# Copy project files
COPY ./src /var/www

# Copy entrypoint script
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Default command
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

