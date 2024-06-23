<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\PasienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('/kamar', KamarController::class);
Route::get('/pasien', [PasienController::class, 'index']);
Route::post('/pasien/masuk', [PasienController::class, 'pasienMasuk']);
Route::delete('/pasien/keluar/{id}', [PasienController::class, 'pasienKeluar']);