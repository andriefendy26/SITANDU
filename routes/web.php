<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LayananController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KegiatanPosyanduController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Layanan
Route::get('/layanan',       [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{id}',  [LayananController::class, 'show'])->name('layanan.show');

// ── Kegiatan ──────────────────────────────────
Route::get('/kegiatanopd',        [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatanopd/{slug}', [KegiatanController::class, 'show'])->name('kegiatan.show');

// ── Kegiatan ──────────────────────────────────
Route::get('/kegiatanposyandu',        [KegiatanPosyanduController::class, 'index'])->name('kegiatanposyandu.index');
Route::get('/kegiatanposyandu/{slug}', [KegiatanPosyanduController::class, 'show'])->name('kegiatanposyandu.show');
 
// ── Artikel ───────────────────────────────────
Route::get('/artikel',        [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');
 
// ── Dokumen ───────────────────────────────────
// Route::get('/dokumen',                   [DokumenController::class, 'index'])->name('dokumen.index');
// Route::get('/dokumen/{id}/download',     [DokumenController::class, 'download'])->name('dokumen.download');
 
