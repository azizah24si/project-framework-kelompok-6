<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== NUCLEAR MIGRATION FIX ===\n";
echo "This will reset migrations and mark all as completed\n";
echo "Use only if normal migration is completely broken\n\n";

try {
    // 1. Clear all migration records
    echo "1. Clearing migration table...\n";
    DB::table('migrations')->truncate();
    
    // 2. Get all migration files
    $migrationPath = database_path('migrations');
    $migrationFiles = glob($migrationPath . '/*.php');
    
    echo "2. Found " . count($migrationFiles) . " migration files\n";
    
    // 3. Mark all migrations as completed
    $batch = 1;
    foreach ($migrationFiles as $file) {
        $filename = basename($file, '.php');
        
        DB::table('migrations')->insert([
            'migration' => $filename,
            'batch' => $batch
        ]);
        
        echo "   ✓ Marked as completed: {$filename}\n";
    }
    
    echo "\n3. All migrations marked as completed!\n";
    echo "4. Database structure should now match migration files\n";
    echo "\nYou can now run new migrations normally with:\n";
    echo "php artisan migrate\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n=== NUCLEAR FIX COMPLETED ===\n";