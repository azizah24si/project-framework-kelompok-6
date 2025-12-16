<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== FORCE FIX MIGRATION ===\n";

try {
    // Langsung insert migrasi yang bermasalah ke tabel migrations
    $problematicMigrations = [
        '2025_12_15_123055_create_progres_photos_table',
        '2025_12_15_124013_create_lokasi_media_table',
        '2025_12_16_113002_add_foreign_key_to_progres_photos_table',
        '2026_01_09_000000_add_role_column_to_users_table',
        '2026_02_01_000000_create_progres_proyek_table',
        '2026_02_01_000100_create_lokasi_proyek_table',
        '2026_02_01_000200_create_kontraktor_table',
    ];

    foreach ($problematicMigrations as $migration) {
        // Cek apakah sudah ada
        $exists = DB::table('migrations')->where('migration', $migration)->exists();
        
        if (!$exists) {
            DB::table('migrations')->insert([
                'migration' => $migration,
                'batch' => 1
            ]);
            echo "✓ Added: {$migration}\n";
        } else {
            echo "- Already exists: {$migration}\n";
        }
    }
    
    echo "\n=== ALL MIGRATIONS IN DATABASE ===\n";
    $allMigrations = DB::table('migrations')->orderBy('migration')->get();
    foreach ($allMigrations as $mig) {
        echo "Batch {$mig->batch}: {$mig->migration}\n";
    }
    
    echo "\n✅ Fix completed! Now run: php artisan migrate --force\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}