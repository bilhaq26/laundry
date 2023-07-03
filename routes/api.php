<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\AuthorizationController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\TransaksiController;

Route::post('/login', [AuthorizationController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthorizationController::class, 'logout']);

    // pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/{id}', [PelangganController::class, 'show']);
    Route::get('/pelanggan/search/{param}', [PelangganController::class, 'search']);
    Route::post('/pelanggan', [PelangganController::class, 'store']);
    Route::post('/pelanggan/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);

    // layanan
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/layanan/{id}', [LayananController::class, 'show']);
    Route::get('/layanan/search/{param}', [LayananController::class, 'search']);
    Route::post('/layanan', [LayananController::class, 'store']);
    Route::post('/layanan/{id}', [LayananController::class, 'update']);
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy']);

    // transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);
    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detailTransaksi']);
    Route::get('/transaksi/search/{param}', [TransaksiController::class, 'search']);
    // store
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    Route::post('/transaksi/{id}', [TransaksiController::class, 'update']);

});
