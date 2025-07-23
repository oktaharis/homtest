<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::get('/login',   [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',  [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // (Admin Only)
    Route::prefix('master')->middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('users', UserController::class)->names('master.users');
        Route::resource('wilayah', WilayahController::class)->names('master.wilayah');
        Route::resource('pegawai', PegawaiController::class)->names('master.pegawai');
        Route::resource('tindakan', TindakanController::class)->names('master.tindakan');
        Route::resource('obat', ObatController::class)->names('master.obat');
    });

    //  (Admin dan Petugas)
    Route::prefix('master')->middleware(['auth', 'role:admin,petugas'])->group(function () {
        Route::resource('pasien', PasienController::class)->names('master.pasien');
    });

    //  (Petugas dan Dokter)
    Route::prefix('transaksi')->middleware(['auth', 'role:petugas,dokter'])->group(function () {
        Route::resource('kunjungan', KunjunganController::class)->names('transaksi.kunjungan');
        Route::resource('tindakan', TransaksiTindakanController::class)->names('transaksi.tindakan')->parameters(['tindakan' => 'transaksiTindakan'])->middleware('role:dokter');
        Route::resource('obat', TransaksiObatController::class)->names('transaksi.obat')->parameters(['obat' => 'transaksiObat'])->middleware('role:dokter');
    });

    //  (Kasir)
    Route::prefix('pembayaran')->middleware(['auth', 'role:kasir'])->group(function () {
        Route::resource('/pembayaran', PembayaranController::class)->names('pembayaran');
    });

    //  (Admin dan Kasir)
    Route::prefix('laporan')->middleware(['auth', 'role:admin,kasir'])->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
    });
});
