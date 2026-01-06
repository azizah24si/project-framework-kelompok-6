<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== FIXING HOSTING ERROR ===\n";

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

try {
    // 1. Cek koneksi database
    echo "1. Testing database connection...\n";
    DB::connection()->getPdo();
    echo "✓ Database connection OK\n";
    
    // 2. Cek tabel yang diperlukan untuk dashboard
    $requiredTables = ['users', 'proyek', 'tahapan_proyek', 'kontraktor', 'progres_proyek', 'lokasi_proyek'];
    
    echo "\n2. Checking required tables...\n";
    foreach ($requiredTables as $table) {
        if (Schema::hasTable($table)) {
            $count = DB::table($table)->count();
            echo "✓ Table '{$table}' exists with {$count} records\n";
        } else {
            echo "❌ Table '{$table}' does not exist\n";
        }
    }
    
    // 3. Test model access
    echo "\n3. Testing model access...\n";
    
    try {
        $userCount = \App\Models\User::count();
        echo "✓ User model: {$userCount} records\n";
    } catch (Exception $e) {
        echo "❌ User model error: " . $e->getMessage() . "\n";
    }
    
    try {
        $proyekCount = \App\Models\Proyek::count();
        echo "✓ Proyek model: {$proyekCount} records\n";
    } catch (Exception $e) {
        echo "❌ Proyek model error: " . $e->getMessage() . "\n";
    }
    
    try {
        $tahapanCount = \App\Models\TahapanProyek::count();
        echo "✓ TahapanProyek model: {$tahapanCount} records\n";
    } catch (Exception $e) {
        echo "❌ TahapanProyek model error: " . $e->getMessage() . "\n";
    }
    
    try {
        $kontraktorCount = \App\Models\Kontraktor::count();
        echo "✓ Kontraktor model: {$kontraktorCount} records\n";
    } catch (Exception $e) {
        echo "❌ Kontraktor model error: " . $e->getMessage() . "\n";
    }
    
    try {
        $progresCount = \App\Models\ProgresProyek::count();
        echo "✓ ProgresProyek model: {$progresCount} records\n";
    } catch (Exception $e) {
        echo "❌ ProgresProyek model error: " . $e->getMessage() . "\n";
    }
    
    try {
        $lokasiCount = \App\Models\LokasiProyek::count();
        echo "✓ LokasiProyek model: {$lokasiCount} records\n";
    } catch (Exception $e) {
        echo "❌ LokasiProyek model error: " . $e->getMessage() . "\n";
    }
    
    echo "\n=== DIAGNOSIS COMPLETED ===\n";
    
} catch (Exception $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
    echo "Please check your .env database configuration\n";
}

echo "\nIf there are missing tables, run: php artisan migrate --force\n";
echo "If models are missing, check if the files exist in app/Models/\n";