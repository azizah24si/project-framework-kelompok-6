#!/bin/bash

echo "=== LARAVEL DEPLOYMENT SCRIPT FOR ALWAYSDATA ==="

# 1. Install dependencies
echo "Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# 2. Copy environment file
if [ ! -f .env ]; then
    echo "Copying production environment file..."
    cp .env.production .env
    echo "⚠️  IMPORTANT: Edit .env file with your database credentials!"
fi

# 3. Generate application key if not set
echo "Generating application key..."
php artisan key:generate --force

# 4. Clear all caches
echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 5. Force fix migration issues (new approach)
echo "Force fixing migration issues..."
php force_fix_migration.php

# 6. Run migrations (should work now)
echo "Running migrations..."
php artisan migrate --force

# 7. Create storage link
echo "Creating storage link..."
php artisan storage:link

# 8. Set proper permissions (if needed)
echo "Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# 9. Cache configuration for production
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "=== DEPLOYMENT COMPLETED ==="
echo ""
echo "Next steps:"
echo "1. Edit .env file with your AlwaysData database credentials"
echo "2. Make sure your web root points to /public directory"
echo "3. Test your application"
echo ""
echo "Database configuration example:"
echo "DB_HOST=mysql-youraccount.alwaysdata.net"
echo "DB_DATABASE=youraccount_databasename"
echo "DB_USERNAME=youraccount_username"
echo "DB_PASSWORD=your-password"
echo ""
echo "If you still get migration errors, try:"
echo "php force_fix_migration.php"
echo "php artisan migrate:reset"
echo "php artisan migrate --force"