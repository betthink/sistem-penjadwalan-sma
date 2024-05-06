<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\hariController;
use App\Http\Controllers\jamController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\mpController;
use App\Http\Controllers\pengampuController;
use App\Http\Controllers\tahunakademikController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
// routes auth
Route::get('/login', [authController::class, 'showFormLogin'])->name('login');
Route::post('/login', [authController::class, 'login'])->name('auth');
Route::post('/logout', [authController::class, 'logout'])->name('logout');
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
// routes guru
Route::get('/guru', [guruController::class, 'index'])->name('guru');
Route::delete('/guru-delete/{id}', [guruController::class, 'delete'])->name('hapus_guru');
Route::get('/guru/{id}/edit', [guruController::class, 'edit'])->name('edit_guru');
Route::put('/guru/{id}', [guruController::class, 'update'])->name('update_guru');
Route::get('/guru/tambah', [guruController::class, 'tambah'])->name('tambah_guru');
Route::post('/guru/tambah', [guruController::class, 'create'])->name('store_guru');
// routes kelas
Route::get('/kelas', [kelasController::class, 'index'])->name('kelas');
Route::get('/kelas/tambah', [kelasController::class, 'tambah'])->name('tambah_kelas');
Route::get('/kelas/{id}/edit', [kelasController::class, 'edit'])->name('edit_kelas');
Route::post('/kelas/tambah', [kelasController::class, 'create'])->name('store_kelas');
Route::delete('/kelas-delete/{id}', [kelasController::class, 'delete'])->name('hapus_kelas');
Route::put('/kelas/{id}', [kelasController::class, 'update'])->name('update_kelas');
// routes
Route::get('/mata-pelajaran', [mpController::class, 'index'])->name('mapel');
Route::get('/mata-pelajaran/tambah', [mpController::class, 'tambah'])->name('tambah_mapel');
Route::post('/mata-pelajaran/tambah', [mpController::class, 'create'])->name('store_mapel');
Route::get('/mata-pelajaran/{id}/edit', [mpController::class, 'edit'])->name('edit_mapel');
Route::put('/mata-pelajaran/{id}', [mpController::class, 'update'])->name('update_mapel');
Route::delete('/mata-pelajaran/{id}', [mpController::class, 'delete'])->name('hapus_mapel');

// hari
Route::get('/hari', [hariController::class, 'index'])->name('hari');
Route::post('/hari', [hariController::class, 'create'])->name('tambah_hari');
Route::delete('/hari/{id}', [hariController::class, 'delete'])->name('hapus_hari');
Route::put('/hari/{id}', [hariController::class, 'update'])->name('update_hari');
// jam
Route::get('/jam', [jamController::class, 'index'])->name('jam');
Route::post('/jam', [jamController::class, 'create'])->name('tambah_jam');
Route::delete('/jam/{id}', [jamController::class, 'delete'])->name('hapus_jam');
Route::put('/jam/{id}', [jamController::class, 'update'])->name('update_jam');
// pengampu
Route::get('/pengampu', [pengampuController::class, 'index'])->name('pengampu');
Route::post('/pengampu', [pengampuController::class, 'create'])->name('tambah_pengampu');
Route::delete('/pengampu/{id}', [pengampuController::class, 'delete'])->name('hapus_pengampu');
Route::put('/pengampu/{id}', [pengampuController::class, 'update'])->name('update_pengampu');
// tahun akademik
Route::get('/tahun-akademik', [tahunakademikController::class, 'index'])->name('tahun_akademik');
Route::post('/tahun-akademik', [tahunakademikController::class, 'create'])->name('tambah_tahun_akademik');
Route::delete('/tahun-akademik/{id}', [tahunakademikController::class, 'delete'])->name('hapus_tahun_akademik');