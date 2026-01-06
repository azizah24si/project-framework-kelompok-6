#!/bin/bash

echo "=== CLEAN DEPLOYMENT SCRIPT ==="

# 1. Install dependencies
echo "1. Installing dependencies..."
composer install --no-dev --optimize-autoloader

# 2. Generate key
echo "2. Generating application key..."
php artisan key:generate --force

# 3. Clear all caches
echo "3. Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 4. Run migrations
echo "4. Running migrations..."
php artisan migrate --force

# 5. Setup storage
echo "5. Setting up storage..."
php artisan storage:link

# 6. Set permissions
echo "6. Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

echo ""
echo "=== DEPLOYMENT COMPLETED ==="
echo ""
echo "Make sure:"
echo "1. .env file has correct database settings"
echo "2. APP_URL matches your domain"
echo "3. Web root points to /public directory"