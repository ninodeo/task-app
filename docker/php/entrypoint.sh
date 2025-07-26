#!/bin/bash
set -e

echo "🚀 Entrypoint started..."

cd /var/www

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
    echo "✅ .env created from .env.example"
fi

if [ ! -d node_modules ]; then
    echo "📦 Running npm install..."
    npm install
fi

if [ ! -d vendor ]; then
    echo "🎼 Running composer install..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

php artisan config:clear
php artisan route:clear
php artisan view:clear

chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data .

# ✅ Start Vite dev server in background
echo "🌐 Starting Vite dev server..."
npm run dev &

# ✅ Start PHP-FPM in foreground (this keeps the container running)
echo "🐘 Starting PHP-FPM..."
exec php-fpm
echo "🚀 Entrypoint completed successfully."