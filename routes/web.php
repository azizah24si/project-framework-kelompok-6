<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanProyekController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('checkislogin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('checkrole:super admin|admin')->group(function () {
        Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    });

    Route::post('proyek/{proyek}/files', [ProyekController::class, 'storeFiles'])->name('proyek.files.store');
    Route::delete('proyek/files/{file}', [ProyekController::class, 'destroyFile'])->name('proyek.files.destroy');
    Route::resource('proyek', ProyekController::class);

    Route::resource('tahapan_proyek', TahapanProyekController::class);
});
