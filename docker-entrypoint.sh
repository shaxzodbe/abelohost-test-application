#!/bin/bash
set -e

echo "Installing dependencies..."
composer install --no-interaction --prefer-dist

echo "Running database migrations and sha..."
php seed.php

mkdir -p /var/www/html/storage/smarty/templates_c
mkdir -p /var/www/html/storage/smarty/cache

chown -R www-data:www-data /var/www/html/storage

echo "Starting Apache..."
exec "$@"
