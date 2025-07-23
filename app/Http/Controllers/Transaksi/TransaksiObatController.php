<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Obat;
use App\Models\TransaksiObat;
use Illuminate\Http\Request;

class TransaksiObatController extends Controller
{
    public function index()
    {
        $transaksiObat = TransaksiObat::with(['kunjungan.pasien', 'obat'])
        ->orderBy('updated_at', 'desc')
        ->paginate(10);
        return view('transaksi.obat.index', compact('transaksiObat'));
    }

    public function create()
    {
        $kunjungan = Kunjungan::where('status', 'pendaftaran')->with('pasien')->get();
        $obat = Obat::paginate(10);
        return view('transaksi.obat.create', compact('kunjungan', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        $obat = Obat::findOrFail($request->obat_id);
        if ($obat->stok < $request->jumlah) {
            return back()->withErrors(['jumlah' => 'Stok obat tidak cukup.']);
        }

        TransaksiObat::create($request->only(['kunjungan_id', 'obat_id', 'jumlah', 'catatan']));

        $obat->decrement('stok', $request->jumlah);

        return redirect()->route('transaksi.obat.index')->with('success', 'Transaksi Obat created successfully.');
    }

    public function edit(TransaksiObat $transaksiObat)
    {
        $kunjungan = Kunjungan::where('status', 'pendaftaran')->with('pasien')->get();
        $obat = Obat::paginate(10);
        return view('transaksi.obat.edit', compact('transaksiObat', 'kunjungan', 'obat'));
    }

    public function update(Request $request, TransaksiObat $transaksiObat)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        $obat = Obat::findOrFail($request->obat_id);
        $stokKembali = $transaksiObat->jumlah; // Kembalikan stok sebelumnya
        if ($obat->stok + $stokKembali < $request->jumlah) {
            return back()->withErrors(['jumlah' => 'Stok obat tidak cukup.']);
        }

        $transaksiObat->update($request->only(['kunjungan_id', 'obat_id', 'jumlah', 'catatan']));

        $obat->increment('stok', $stokKembali);
        $obat->decrement('stok', $request->jumlah);

        return redirect()->route('transaksi.obat.index')->with('success', 'Transaksi Obat updated successfully.');
    }

    public function destroy(TransaksiObat $transaksiObat)
    {
        $obat = Obat::findOrFail($transaksiObat->obat_id);
        $obat->increment('stok', $transaksiObat->jumlah);

        $transaksiObat->delete();
        return redirect()->route('transaksi.obat.index')->with('success', 'Transaksi Obat deleted successfully.');
    }
}