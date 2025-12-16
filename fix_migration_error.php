<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "=== FIXING MIGRATION ERROR ===\n";

// Migrasi yang error: 2025_12_15_123055_create_progres_photos_table
$migration = '2025_12_15_123055_create_progres_photos_table';
$tableName = 'progres_photos';

try {
    // Cek apakah tabel sudah ada
    if (Schema::hasTable($tableName)) {
        echo "✓ Table '{$tableName}' already exists\n";
        
        // Cek apakah migrasi sudah tercatat
        $migrationExists = DB::table('migrations')->where('migration', $migration)->exists();
        
        if (!$migrationExists) {
            // Mark migrasi sebagai sudah dijalankan
            DB::table('migrations')->insert([
                'migration' => $migration,
                'batch' => 1
            ]);
            echo "✓ Marked migration as completed: {$migration}\n";
        } else {
            echo "✓ Migration already recorded: {$migration}\n";
        }
    } else {
        echo "! Table '{$tableName}' does not exist, migration is needed\n";
    }
    
    echo "\n=== CURRENT MIGRATION STATUS ===\n";
    $migrations = DB::table('migrations')
        ->where('migration', 'like', '%progres_photos%')
        ->get();
    
    if ($migrations->count() > 0) {
        foreach ($migrations as $mig) {
            echo "Recorded: {$mig->migration} (batch {$mig->batch})\n";
        }
    } else {
        echo "No progres_photos migrations recorded\n";
    }
    
    echo "\nNow you can run: php artisan migrate --force\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== DONE ===\n";