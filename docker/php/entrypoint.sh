#!/bin/bash

set -e

echo "Starting entrypoint.sh script..."

# Copy .env file if not present
if [ ! -f /var/www/.env ] && [ -f /var/www/.env.example ]; then
    cp /var/www/.env.example /var/www/.env
    echo ".env created from .env.example"
fi

# Run npm install if node_modules doesn't exist
if [ ! -d /var/www/node_modules ]; then
    cd /var/www
    echo "Running npm install..."
    npm install
fi

# Composer install if vendor missing
if [ ! -d /var/www/vendor ]; then
    echo "Running composer install..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Optional Laravel setup
cd /var/www
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Fix permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data .

# Run PHP-FPM
exec php-fpm
