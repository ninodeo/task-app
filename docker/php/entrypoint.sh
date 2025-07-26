#!/bin/bash

set -e

echo "Starting entrypoint.sh script..."

# Ensure we're in the project directory
cd /var/www

# Copy .env file if not present
if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
    echo ".env created from .env.example"
fi

# Run npm install if node_modules doesn't exist
if [ ! -d node_modules ]; then
    echo "Running npm install..."
    npm install
fi

# Run composer install if vendor is missing
if [ ! -d vendor ]; then
    echo "Running composer install..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Laravel setup: clear caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data .

# Run PHP-FPM
exec php-fpm
