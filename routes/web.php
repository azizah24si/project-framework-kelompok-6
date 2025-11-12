<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanProyekController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('proyek', ProyekController::class);

Route::resource('tahapan_proyek', TahapanProyekController::class);
