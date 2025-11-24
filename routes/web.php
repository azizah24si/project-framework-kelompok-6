<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanProyekController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest', function () {
    return view('guest');
});

Route::get('/poseify', function () {
    return response()->file(public_path('Poseify/index.html'));
});

Route::get('/admin', function () {
    return view('admin.volt-dashboard');
});

Route::resource('proyek', ProyekController::class);

Route::resource('tahapan_proyek', TahapanProyekController::class);
