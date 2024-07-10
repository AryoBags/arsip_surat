<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\KategoriSuratController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::resource('kategoriSurat',KategoriSuratController::class);
Route::resource('Surat',SuratController::class);
Route::resource('About',AboutController::class);
