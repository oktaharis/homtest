<?php

namespace App\Http\Controllers\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pembayaran;
use App\Models\TransaksiTindakan;
use App\Models\TransaksiObat;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // dd(1);
        $pembayaran = Pembayaran::with('kunjungan.pasien')->paginate(10);
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $kunjungan = Kunjungan::where('status', 'selesai')->with('pasien')->get();
        return view('pembayaran.create', compact('kunjungan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'status' => 'required|in:belum_bayar,lunas',
            'tanggal_bayar' => 'nullable|date',
        ]);

        $kunjungan = Kunjungan::findOrFail($request->kunjungan_id);
        
        // Hitung total biaya dari transaksi tindakan dan obat
        $totalTindakan = TransaksiTindakan::where('kunjungan_id', $kunjungan->id)
            ->join('tindakan', 'transaksi_tindakan.tindakan_id', '=', 'tindakan.id')
            ->sum(\DB::raw('transaksi_tindakan.jumlah * tindakan.biaya'));

        $totalObat = TransaksiObat::where('kunjungan_id', $kunjungan->id)
            ->join('obat', 'transaksi_obat.obat_id', '=', 'obat.id')
            ->sum(\DB::raw('transaksi_obat.jumlah * obat.harga'));

        $totalBiaya = $totalTindakan + $totalObat;

        Pembayaran::create([
            'kunjungan_id' => $request->kunjungan_id,
            'total_biaya' => $totalBiaya,
            'status' => $request->status,
            'tanggal_bayar' => $request->tanggal_bayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran created successfully.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        // dd(1);
        $kunjungan = Kunjungan::where('status', 'selesai')->with('pasien')->get();
        return view('pembayaran.edit', compact('pembayaran', 'kunjungan'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'status' => 'required|in:belum_bayar,lunas',
            'tanggal_bayar' => 'nullable|date',
        ]);

        $kunjungan = Kunjungan::findOrFail($request->kunjungan_id);

        // Hitung total biaya dari transaksi tindakan dan obat
        $totalTindakan = TransaksiTindakan::where('kunjungan_id', $kunjungan->id)
            ->join('tindakan', 'transaksi_tindakan.tindakan_id', '=', 'tindakan.id')
            ->sum(\DB::raw('transaksi_tindakan.jumlah * tindakan.biaya'));

        $totalObat = TransaksiObat::where('kunjungan_id', $kunjungan->id)
            ->join('obat', 'transaksi_obat.obat_id', '=', 'obat.id')
            ->sum(\DB::raw('transaksi_obat.jumlah * obat.harga'));

        $totalBiaya = $totalTindakan + $totalObat;

        $pembayaran->update([
            'kunjungan_id' => $request->kunjungan_id,
            'total_biaya' => $totalBiaya,
            'status' => $request->status,
            'tanggal_bayar' => $request->tanggal_bayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran updated successfully.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran deleted successfully.');
    }
}