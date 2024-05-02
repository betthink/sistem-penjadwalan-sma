<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\kelasController;
use Illuminate\Support\Facades\Route;

// routes guruu
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
Route::delete('/guru-delete/{id}', [guruController::class, 'delete'])->name('hapus_guru');

Route::get('/guru/{id}/edit', [guruController::class, 'edit'])->name('edit_guru');
Route::put('/guru/{id}', [guruController::class, 'update'])->name('update_guru');
Route::get('/guru', [guruController::class, 'index'])->name('guru');
Route::get('/guru/tambah', [guruController::class, 'tambah'])->name('tambah_guru');
Route::post('/guru/tambah', [guruController::class, 'create'])->name('store_guru');
// routes kelas
Route::get('/kelas', [kelasController::class, 'index'])->name('kelas');
Route::get('/kelas/tambah', [kelasController::class, 'tambah'])->name('tambah_kelas');
Route::get('/kelas/{id}/edit', [kelasController::class, 'edit'])->name('edit_kelas');
Route::post('/kelas/tambah', [kelasController::class, 'create'])->name('store_kelas');
Route::delete('/kelas-delete/{id}', [kelasController::class, 'delete'])->name('hapus_kelas');
Route::put('/kelas/{id}', [kelasController::class, 'update'])->name('update_kelas');
