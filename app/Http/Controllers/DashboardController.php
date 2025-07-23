<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pembayaran;
use App\Models\TransaksiObat;
use App\Models\TransaksiTindakan;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $data = [];

        switch ($role) {
            case 'admin':
                $data = [
                    'total_users' => User::count(),
                    'total_pasien' => Pasien::count(),
                    'total_kunjungan' => Kunjungan::count(),
                    'total_pembayaran' => Pembayaran::where('status', 'lunas')->count(),
                ];
                break;
            case 'petugas':
                $data = [
                    'total_pasien' => Pasien::count(),
                    'kunjungan_hari_ini' => Kunjungan::whereDate('tanggal_kunjungan', today())->count(),
                ];
                break;
            case 'dokter':
                $data = [
                    'kunjungan_dokter' => Kunjungan::where('user_id', Auth::id())->count(),
                    'transaksi_tindakan' => TransaksiTindakan::whereHas('kunjungan', function ($query) {
                        $query->where('user_id', Auth::id());
                    })->count(),
                    'transaksi_obat' => TransaksiObat::whereHas('kunjungan', function ($query) {
                        $query->where('user_id', Auth::id());
                    })->count(),
                ];
                break;
            case 'kasir':
                $data = [
                    'pembayaran_lunas' => Pembayaran::where('status', 'lunas')->count(),
                    'pembayaran_belum_bayar' => Pembayaran::where('status', 'belum_bayar')->count(),
                ];
                break;
            default:
                abort(403, 'Unauthorized: Invalid role.');
        }

        return view('dashboard', compact('data', 'role'));
    }
}