#!/bin/sh

# Run Laravel setup (|| true prevents container crash if these fail)
php artisan cache:clear || true
php artisan config:clear || true
php artisan config:cache || true
php artisan route:clear || true
php artisan view:clear || true

# Run database migrations automatically on startup
php artisan migrate --force || true

# Start PHP-FPM in background
php-fpm -D

# Wait for php-fpm to be ready
sleep 2

# Start Nginx in foreground (exec replaces shell process cleanly)
exec nginx -g "daemon off;"