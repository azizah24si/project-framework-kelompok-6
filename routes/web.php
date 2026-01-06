<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanProyekController;
use App\Http\Controllers\ProgresProyekController;
use App\Http\Controllers\LokasiProyekController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('checkislogin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('checkrole:super admin|admin')->group(function () {
        Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update']);
    });

    Route::post('proyek/{proyek}/files', [ProyekController::class, 'storeFiles'])->name('proyek.files.store');
    Route::delete('proyek/files/{file}', [ProyekController::class, 'destroyFile'])->name('proyek.files.destroy');
    Route::resource('proyek', ProyekController::class);

    Route::resource('tahapan_proyek', TahapanProyekController::class);

    Route::delete('progres_proyek/photos/{photo}', [ProgresProyekController::class, 'destroyPhoto'])->name('progres_proyek.photos.destroy');
    Route::resource('progres_proyek', ProgresProyekController::class);

    Route::delete('lokasi_proyek/media/{media}', [LokasiProyekController::class, 'destroyMedia'])->name('lokasi_proyek.media.destroy');
    Route::resource('lokasi_proyek', LokasiProyekController::class);
    Route::resource('kontraktor', KontraktorController::class);

    // Profile routes
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.photo.delete');
});
