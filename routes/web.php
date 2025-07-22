<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Master\ObatController;
use App\Http\Controllers\Master\PasienController;
use App\Http\Controllers\Master\PegawaiController;
use App\Http\Controllers\Master\TindakanController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\WilayahController;
use App\Http\Controllers\Pembayaran\PembayaranController;
use App\Http\Controllers\Transaksi\KunjunganController;
use App\Http\Controllers\Transaksi\TransaksiObatController;
use App\Http\Controllers\Transaksi\TransaksiTindakanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Master Data Routes (Admin Only)
Route::prefix('master')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->names('master.users');
    Route::resource('wilayah', WilayahController::class)->names('master.wilayah');
    Route::resource('pegawai', PegawaiController::class)->names('master.pegawai');
    Route::resource('tindakan', TindakanController::class)->names('master.tindakan');
    Route::resource('obat', ObatController::class)->names('master.obat');
});

// Pasien Routes (Admin dan Petugas)
Route::prefix('master')->middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::resource('pasien', PasienController::class)->names('master.pasien');
});

// Transaksi Routes (Petugas dan Dokter)
Route::prefix('transaksi')->middleware(['auth', 'role:petugas,dokter'])->group(function () {
    Route::resource('kunjungan', KunjunganController::class)->names('transaksi.kunjungan');
    Route::resource('tindakan', TransaksiTindakanController::class)->names('transaksi.tindakan')->middleware('role:dokter');
    Route::resource('obat', TransaksiObatController::class)->names('transaksi.obat')->middleware('role:dokter');
});

// Pembayaran Routes (Kasir)
Route::prefix('pembayaran')->middleware(['auth', 'role:kasir'])->group(function () {
    Route::resource('/', PembayaranController::class)->names('pembayaran');
});

// Laporan Routes (Admin dan Kasir)
Route::prefix('laporan')->middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/kunjungan', [LaporanController::class, 'kunjungan'])->name('laporan.kunjungan');
    Route::get('/tindakan', [LaporanController::class, 'tindakan'])->name('laporan.tindakan');
    Route::get('/obat', [LaporanController::class, 'obat'])->name('laporan.obat');
});
