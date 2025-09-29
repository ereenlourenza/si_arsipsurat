<?php

use App\Http\Controllers\ArsipSuratController;
use App\Http\Controllers\KategoriSuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArsipSuratController::class, 'index']); // halaman utama
Route::resource('arsip', ArsipSuratController::class);
Route::resource('kategori', KategoriSuratController::class);
Route::get('/about', function () {
    return view('about');
});