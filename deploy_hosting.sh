#!/bin/bash

echo "=== SIMPLE DEPLOYMENT FOR ALWAYSDATA ==="

# 1. Install dependencies
echo "1. Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# 2. Generate application key if not set
echo "2. Generating application key..."
php artisan key:generate --force

# 3. Clear all caches
echo "3. Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 4. Run safe migration
echo "4. Running safe migration..."
php safe_migrate.php

# 5. Create storage link (try both methods)
echo "5. Setting up storage..."
php artisan storage:link 2>/dev/null || echo "Symlink failed, will copy files manually"

# Copy files manually if symlink fails
if [ ! -d "public/storage" ] || [ ! -L "public/storage" ]; then
    echo "Creating public/storage directory and copying files..."
    mkdir -p public/storage
    if [ -d "storage/app/public" ]; then
        cp -r storage/app/public/* public/storage/ 2>/dev/null || echo "No files to copy"
    fi
fi

# 6. Set permissions
echo "6. Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public/storage 2>/dev/null || echo "public/storage not found"

# 7. Cache for production
echo "7. Caching for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "=== DEPLOYMENT COMPLETED ==="
echo ""
echo "Next steps:"
echo "1. Make sure .env file has correct database credentials"
echo "2. Test the application by visiting your domain"
echo "3. Register a new user to test functionality"
echo ""
echo "If you get errors:"
echo "1. Run: php fix_hosting_error.php (to diagnose issues)"
echo "2. Check storage/logs/laravel.log for detailed errors"
echo "3. Ensure all required tables exist in database"