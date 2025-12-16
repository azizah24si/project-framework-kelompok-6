<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "=== DEPLOYMENT FIX SCRIPT ===\n";

// Daftar migrasi yang mungkin sudah ada tabelnya tapi belum tercatat
$problematicMigrations = [
    '2025_12_15_123055_create_progres_photos_table' => 'progres_photos',
    '2025_12_15_124013_create_lokasi_media_table' => 'lokasi_media',
    '2025_12_16_113002_add_foreign_key_to_progres_photos_table' => null, // tidak ada tabel baru
    '2026_01_09_000000_add_role_column_to_users_table' => null, // kolom di tabel users
    '2026_02_01_000000_create_progres_proyek_table' => 'progres_proyek',
    '2026_02_01_000100_create_lokasi_proyek_table' => 'lokasi_proyek',
    '2026_02_01_000200_create_kontraktor_table' => 'kontraktor',
];

foreach ($problematicMigrations as $migration => $tableName) {
    // Cek apakah migrasi sudah tercatat
    $migrationExists = DB::table('migrations')->where('migration', $migration)->exists();
    
    if ($migrationExists) {
        echo "✓ Migration already recorded: {$migration}\n";
        continue;
    }
    
    // Jika ada nama tabel, cek apakah tabel sudah ada
    if ($tableName && Schema::hasTable($tableName)) {
        // Tabel sudah ada, mark migrasi sebagai sudah dijalankan
        DB::table('migrations')->insert([
            'migration' => $migration,
            'batch' => 1
        ]);
        echo "✓ Marked existing table as migrated: {$migration} -> {$tableName}\n";
    } elseif (!$tableName) {
        // Untuk migrasi yang tidak membuat tabel baru (seperti add column)
        // Cek apakah kolom/constraint sudah ada
        if ($migration === '2026_01_09_000000_add_role_column_to_users_table') {
            if (Schema::hasColumn('users', 'role')) {
                DB::table('migrations')->insert([
                    'migration' => $migration,
                    'batch' => 1
                ]);
                echo "✓ Marked column migration as done: {$migration}\n";
            } else {
                echo "! Column 'role' not found in users table: {$migration}\n";
            }
        } else {
            // Mark other non-table migrations as done
            DB::table('migrations')->insert([
                'migration' => $migration,
                'batch' => 1
            ]);
            echo "✓ Marked migration as done: {$migration}\n";
        }
    } else {
        echo "! Table not found, migration needed: {$migration} -> {$tableName}\n";
    }
}

echo "\n=== CURRENT MIGRATION STATUS ===\n";
$migrations = DB::table('migrations')->orderBy('batch')->orderBy('migration')->get();
foreach ($migrations as $migration) {
    echo "Batch {$migration->batch}: {$migration->migration}\n";
}

echo "\n=== CHECKING TABLES ===\n";
$tables = DB::select('SHOW TABLES');
foreach ($tables as $table) {
    $tableName = array_values((array)$table)[0];
    echo "Table exists: {$tableName}\n";
}

echo "\nDeployment fix completed!\n";