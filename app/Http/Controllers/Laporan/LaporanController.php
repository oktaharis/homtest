<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\TransaksiTindakan;
use App\Models\TransaksiObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Laporan Kunjungan
        $kunjunganQuery = Kunjungan::select(
            DB::raw("DATE(tanggal_kunjungan) as tanggal"),
            DB::raw("COUNT(*) as jumlah")
        );

        // Laporan Tindakan
        $tindakanQuery = TransaksiTindakan::select(
            'tindakan.nama',
            DB::raw("COUNT(transaksi_tindakan.id) as jumlah"),
            DB::raw("SUM(transaksi_tindakan.jumlah * tindakan.biaya) as total_biaya")
        )
            ->join('tindakan', 'transaksi_tindakan.tindakan_id', '=', 'tindakan.id');

        // Laporan Obat
        $obatQuery = TransaksiObat::select(
            'obat.nama',
            DB::raw("SUM(transaksi_obat.jumlah) as jumlah"),
            DB::raw("SUM(transaksi_obat.jumlah * obat.harga) as total_biaya")
        )
            ->join('obat', 'transaksi_obat.obat_id', '=', 'obat.id');

        // Terapkan filter tanggal jika ada
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $kunjunganQuery->whereBetween('tanggal_kunjungan', [
                $request->start_date,
                $request->end_date
            ]);
            $tindakanQuery->whereBetween('transaksi_tindakan.created_at', [
                $request->start_date,
                $request->end_date
            ]);
            $obatQuery->whereBetween('transaksi_obat.created_at', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $kunjungan = $kunjunganQuery->groupBy(DB::raw("DATE(tanggal_kunjungan)"))
            ->orderBy('tanggal', 'desc')
            ->get();

        $tindakan = $tindakanQuery->groupBy('tindakan.nama')
            ->orderBy('jumlah', 'desc')
            ->get();

        $obat = $obatQuery->groupBy('obat.nama')
            ->orderBy('jumlah', 'desc')
            ->get();

        return view('laporan.index', compact('kunjungan', 'tindakan', 'obat'));
    }
}