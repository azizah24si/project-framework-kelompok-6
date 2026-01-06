<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

echo "=== DIRECT REGISTER TEST ===\n";

try {
    // Hapus user test jika ada
    User::where('email', 'testdirect@example.com')->delete();
    
    // Buat user baru langsung
    $user = User::create([
        'name' => 'Test Direct User',
        'email' => 'testdirect@example.com',
        'password' => Hash::make('password123'),
        'role' => 'super admin',
    ]);
    
    echo "✓ User created: {$user->name} ({$user->email})\n";
    
    // Test login langsung
    if (Auth::attempt(['email' => 'testdirect@example.com', 'password' => 'password123'])) {
        echo "✓ Login successful\n";
        echo "✓ Authenticated user: " . Auth::user()->name . "\n";
        
        // Test redirect ke dashboard
        echo "✓ Dashboard route exists: " . (route('dashboard') ? 'Yes' : 'No') . "\n";
        
        Auth::logout();
        echo "✓ Logout successful\n";
    } else {
        echo "❌ Login failed\n";
    }
    
    // Cleanup
    $user->delete();
    echo "✓ Test user deleted\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n=== TEST COMPLETED ===\n";