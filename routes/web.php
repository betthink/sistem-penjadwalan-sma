<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\kelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::get('/guru', [guruController::class, 'index'])->name('guru');
Route::get('/kelas', [kelasController::class, 'index'])->name('kelas');
