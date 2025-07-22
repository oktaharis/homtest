<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\TransaksiObat;
use App\Models\TransaksiTindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function kunjungan()
    {
        $kunjungan = Kunjungan::select(
            DB::raw("DATE(tanggal_kunjungan) as tanggal"),
            DB::raw("COUNT(*) as jumlah")
        )
            ->groupBy(DB::raw("DATE(tanggal_kunjungan)"))
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('laporan.kunjungan', compact('kunjungan'));
    }

    public function tindakan()
    {
        $tindakan = TransaksiTindakan::select(
            'tindakan.nama',
            DB::raw("COUNT(transaksi_tindakan.id) as jumlah"),
            DB::raw("SUM(transaksi_tindakan.jumlah * tindakan.biaya) as total_biaya")
        )
            ->join('tindakan', 'transaksi_tindakan.tindakan_id', '=', 'tindakan.id')
            ->groupBy('tindakan.nama')
            ->orderBy('jumlah', 'desc')
            ->get();

        return view('laporan.tindakan', compact('tindakan'));
    }

    public function obat()
    {
        $obat = TransaksiObat::select(
            'obat.nama',
            DB::raw("SUM(transaksi_obat.jumlah) as jumlah"),
            DB::raw("SUM(transaksi_obat.jumlah * obat.harga) as total_biaya")
        )
            ->join('obat', 'transaksi_obat.obat_id', '=', 'obat.id')
            ->groupBy('obat.nama')
            ->orderBy('jumlah', 'desc')
            ->get();

        return view('laporan.obat', compact('obat'));
    }
}
