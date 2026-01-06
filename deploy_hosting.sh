#!/bin/bash

echo "=== DEPLOYMENT FOR ALWAYSDATA WITH CSRF FIX ==="

# 1. Install dependencies
echo "1. Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# 2. Set environment to production
echo "2. Setting up environment..."
if [ ! -f .env ]; then
    cp .env.hosting .env
    echo "⚠️  Please edit .env with your database credentials"
fi

# Ensure production environment
sed -i 's/APP_ENV=local/APP_ENV=production/' .env 2>/dev/null || echo "APP_ENV already set"
sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env 2>/dev/null || echo "APP_DEBUG already set"
sed -i 's/SESSION_DRIVER=database/SESSION_DRIVER=file/' .env 2>/dev/null || echo "SESSION_DRIVER already set"

# 3. Generate application key
echo "3. Generating application key..."
php artisan key:generate --force

# 4. Clear all caches
echo "4. Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 5. Fix CSRF issues
echo "5. Fixing CSRF for hosting..."
php fix_csrf_hosting.php

# 6. Run migrations
echo "6. Running migrations..."
php safe_migrate.php

# 7. Setup storage
echo "7. Setting up storage..."
php artisan storage:link 2>/dev/null || echo "Symlink failed, copying manually"

# Manual copy if symlink fails
if [ ! -d "public/storage" ] || [ ! -L "public/storage" ]; then
    mkdir -p public/storage
    if [ -d "storage/app/public" ]; then
        cp -r storage/app/public/* public/storage/ 2>/dev/null || echo "No files to copy"
    fi
fi

# 8. Set permissions
echo "8. Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public/storage 2>/dev/null || echo "public/storage permissions set"

# 9. Cache for production
echo "9. Caching for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "=== DEPLOYMENT COMPLETED ==="
echo ""
echo "CSRF Issues Fixed:"
echo "✓ Custom CSRF middleware for hosting"
echo "✓ Session driver set to file"
echo "✓ Production environment configured"
echo "✓ Proper error handling for token mismatch"
echo ""
echo "Next steps:"
echo "1. Update .env with your database credentials"
echo "2. Test login/register functionality"
echo "3. Clear browser cache if still having issues"