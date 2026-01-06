<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== FIXING CSRF FOR HOSTING ===\n";

use Illuminate\Support\Facades\Artisan;

try {
    // 1. Clear all caches
    echo "1. Clearing all caches...\n";
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    echo "✓ Caches cleared\n";
    
    // 2. Check session configuration
    echo "\n2. Checking session configuration...\n";
    echo "Session driver: " . config('session.driver') . "\n";
    echo "Session lifetime: " . config('session.lifetime') . " minutes\n";
    echo "Session path: " . config('session.files') . "\n";
    
    // 3. Check session directory
    $sessionPath = storage_path('framework/sessions');
    if (!is_dir($sessionPath)) {
        mkdir($sessionPath, 0755, true);
        echo "✓ Created session directory\n";
    } else {
        echo "✓ Session directory exists\n";
    }
    
    // 4. Set proper permissions
    chmod($sessionPath, 0755);
    echo "✓ Session directory permissions set\n";
    
    // 5. Test CSRF token generation
    echo "\n3. Testing CSRF token...\n";
    $token = csrf_token();
    echo "✓ CSRF token generated: " . substr($token, 0, 20) . "...\n";
    
    // 6. Check .env configuration
    echo "\n4. Checking .env configuration...\n";
    $envPath = base_path('.env');
    if (file_exists($envPath)) {
        $envContent = file_get_contents($envPath);
        
        if (strpos($envContent, 'SESSION_DRIVER=file') !== false) {
            echo "✓ Session driver is set to file\n";
        } else {
            echo "❌ Session driver not set to file\n";
            echo "Please add or update: SESSION_DRIVER=file\n";
        }
        
        if (strpos($envContent, 'APP_KEY=') !== false && strpos($envContent, 'APP_KEY=base64:') !== false) {
            echo "✓ APP_KEY is set\n";
        } else {
            echo "❌ APP_KEY not properly set\n";
            echo "Run: php artisan key:generate --force\n";
        }
    } else {
        echo "❌ .env file not found\n";
    }
    
    echo "\n=== CSRF FIX COMPLETED ===\n";
    echo "Recommendations:\n";
    echo "1. Ensure SESSION_DRIVER=file in .env\n";
    echo "2. Make sure storage/framework/sessions is writable\n";
    echo "3. Clear browser cache and cookies\n";
    echo "4. Try accessing the site in incognito mode\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}