<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layanan', function () {
    return view('layanan');
});
Route::get('/kegiatan', function () {
    return view('kegiatan');
});
Route::get('/artikel', function () {
    return view('artikel');
});
Route::get('/dokumen', function () {
    return view('dokumen');
});
