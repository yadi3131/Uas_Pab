<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;

Route::apiResource('bukus', BukuController::class);
Route::apiResource('peminjamans', PeminjamanController::class);