<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== SAFE MIGRATION FOR HOSTING ===\n";

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

try {
    // 1. Cek koneksi database
    echo "1. Testing database connection...\n";
    DB::connection()->getPdo();
    echo "✓ Database connected\n";
    
    // 2. Cek status migrasi
    echo "\n2. Checking migration status...\n";
    
    try {
        $migrations = DB::table('migrations')->get();
        echo "✓ Migrations table exists with " . $migrations->count() . " records\n";
    } catch (Exception $e) {
        echo "❌ Migrations table error: " . $e->getMessage() . "\n";
        echo "Creating migrations table...\n";
        Artisan::call('migrate:install');
        echo "✓ Migrations table created\n";
    }
    
    // 3. Jalankan migrasi dengan aman
    echo "\n3. Running migrations safely...\n";
    
    try {
        Artisan::call('migrate', ['--force' => true]);
        echo "✓ Migrations completed\n";
        echo Artisan::output();
    } catch (Exception $e) {
        echo "❌ Migration error: " . $e->getMessage() . "\n";
        
        // Coba pendekatan alternatif - mark existing tables
        echo "Trying alternative approach...\n";
        
        $existingTables = [
            'users' => '0001_01_01_000000_create_users_table',
            'cache' => '0001_01_01_000001_create_cache_table', 
            'jobs' => '0001_01_01_000002_create_jobs_table',
            'proyek' => '2025_10_21_124439_create_proyek_table',
            'tahapan_proyeks' => '2025_11_12_013056_create_tahapan_proyeks_table',
            'proyek_files' => '2025_11_26_000200_create_proyek_files_table',
            'lokasi_media' => '2025_12_15_124013_create_lokasi_media_table',
            'progres_proyek' => '2026_02_01_000000_create_progres_proyek_table',
            'lokasi_proyek' => '2026_02_01_000100_create_lokasi_proyek_table',
            'kontraktor' => '2026_02_01_000200_create_kontraktor_table',
        ];
        
        foreach ($existingTables as $table => $migration) {
            if (Schema::hasTable($table)) {
                $exists = DB::table('migrations')->where('migration', $migration)->exists();
                if (!$exists) {
                    DB::table('migrations')->insert([
                        'migration' => $migration,
                        'batch' => 1
                    ]);
                    echo "✓ Marked {$migration} as completed\n";
                }
            }
        }
        
        // Coba migrasi lagi
        try {
            Artisan::call('migrate', ['--force' => true]);
            echo "✓ Second migration attempt completed\n";
        } catch (Exception $e2) {
            echo "❌ Second migration attempt failed: " . $e2->getMessage() . "\n";
        }
    }
    
    // 4. Cek tabel yang diperlukan
    echo "\n4. Verifying required tables...\n";
    $requiredTables = ['users', 'proyek', 'tahapan_proyek', 'kontraktor'];
    
    foreach ($requiredTables as $table) {
        if (Schema::hasTable($table)) {
            echo "✓ Table '{$table}' exists\n";
        } else {
            echo "❌ Table '{$table}' missing\n";
        }
    }
    
    // 5. Pastikan kolom role ada di users
    echo "\n5. Checking users table structure...\n";
    if (Schema::hasColumn('users', 'role')) {
        echo "✓ Users table has 'role' column\n";
    } else {
        echo "❌ Users table missing 'role' column\n";
        echo "Adding role column...\n";
        try {
            Schema::table('users', function ($table) {
                $table->string('role')->after('password')->default('super admin');
            });
            echo "✓ Role column added\n";
        } catch (Exception $e) {
            echo "❌ Failed to add role column: " . $e->getMessage() . "\n";
        }
    }
    
    echo "\n=== MIGRATION COMPLETED ===\n";
    echo "You can now test your application\n";
    
} catch (Exception $e) {
    echo "❌ Fatal error: " . $e->getMessage() . "\n";
    echo "Please check your database configuration in .env file\n";
}