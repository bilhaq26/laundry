<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['pengunjung'])->group(function () {


Route::prefix('/')->group(function () {

    Route::get('login', App\Http\Livewire\Admin\Auth\Login::class)->name('login');
    Route::get('logout', App\Http\Livewire\Admin\Auth\Logout::class)->name('logout');

    Route::get('detail/{id}', App\Http\Livewire\Main\Detail\Index::class)->name('detail');

    Route::middleware(['auth'])->group(function () {
        Route::get('/', App\Http\Livewire\Admin\Dashboard\Index::class)->name('admin.dashboard');

        // Users
        Route::get('/user', App\Http\Livewire\Admin\User\Index::class)->name('admin.user.index');
        Route::get('/user/buat', App\Http\Livewire\Admin\User\Create::class)->name('admin.user.create');
        Route::get('/user/edit/{id}', App\Http\Livewire\Admin\User\Edit::class)->name('admin.user.edit');

        //Layanan
        Route::get('/layanan', App\Http\Livewire\Admin\Layanan\Index::class)->name('admin.layanan.index');
        Route::get('/layanan/buat', App\Http\Livewire\Admin\Layanan\Create::class)->name('admin.layanan.create');
        Route::get('/layanan/edit/{id}', App\Http\Livewire\Admin\Layanan\Edit::class)->name('admin.layanan.edit');

        //Transaksi
        Route::get('/transaksi', App\Http\Livewire\Admin\Transaksi\Index::class)->name('admin.transaksi.index');
        Route::get('/transaksi/buat', App\Http\Livewire\Admin\Transaksi\Create::class)->name('admin.transaksi.create');
        Route::get('/transaksi/edit/{id}', App\Http\Livewire\Admin\Transaksi\Edit::class)->name('admin.transaksi.edit');

        //Konsumen
        Route::get('/konsumen', App\Http\Livewire\Admin\Konsumen\Index::class)->name('admin.konsumen.index');
        Route::get('/konsumen/buat', App\Http\Livewire\Admin\Konsumen\Create::class)->name('admin.konsumen.create');
        Route::get('/konsumen/edit/{id}', App\Http\Livewire\Admin\Konsumen\Edit::class)->name('admin.konsumen.edit');

        //Informasi
        Route::get('/pelangganinformasi', App\Http\Livewire\Admin\Informasi\Pelanggan::class)->name('admin.informasi.pelanggan');
        Route::get('/detail-pelanggan/{id}', App\Http\Livewire\Admin\Informasi\DetailPelanggan::class)->name('admin.informasi.detail-pelanggan');
        Route::get('/layananinformasi', App\Http\Livewire\Admin\Informasi\Layanan::class)->name('admin.informasi.layanan');
        Route::get('/detail-layanan/{id}', App\Http\Livewire\Admin\Informasi\DetailLayanan::class)->name('admin.informasi.detail-layanan');

        //Keuangan
        Route::get('/bayar', App\Http\Livewire\Admin\Keuangan\Bayar::class)->name('admin.keuangan.bayar');
        });
    });
});
