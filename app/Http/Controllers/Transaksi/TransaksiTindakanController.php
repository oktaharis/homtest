<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use App\Models\TransaksiTindakan;
use Illuminate\Http\Request;

class TransaksiTindakanController extends Controller
{
    public function index()
    {
        $transaksiTindakan = TransaksiTindakan::with(['kunjungan.pasien', 'tindakan'])->get();
        return view('transaksi.tindakan.index', compact('transaksiTindakan'));
    }

    public function create()
    {
        $kunjungan = Kunjungan::where('status', 'pendaftaran')->with('pasien')->get();
        $tindakan = Tindakan::all();
        return view('transaksi.tindakan.create', compact('kunjungan', 'tindakan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'tindakan_id' => 'required|exists:tindakan,id',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        TransaksiTindakan::create($request->only(['kunjungan_id', 'tindakan_id', 'jumlah', 'catatan']));

        return redirect()->route('transaksi.tindakan.index')->with('success', 'Transaksi Tindakan created successfully.');
    }

    public function edit(TransaksiTindakan $transaksiTindakan)
    {
        $kunjungan = Kunjungan::where('status', 'pendaftaran')->with('pasien')->get();
        $tindakan = Tindakan::all();
        return view('transaksi.tindakan.edit', compact('transaksiTindakan', 'kunjungan', 'tindakan'));
    }

    public function update(Request $request, TransaksiTindakan $transaksiTindakan)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'tindakan_id' => 'required|exists:tindakan,id',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        $transaksiTindakan->update($request->only(['kunjungan_id', 'tindakan_id', 'jumlah', 'catatan']));

        return redirect()->route('transaksi.tindakan.index')->with('success', 'Transaksi Tindakan updated successfully.');
    }

    public function destroy(TransaksiTindakan $transaksiTindakan)
    {
        $transaksiTindakan->delete();
        return redirect()->route('transaksi.tindakan.index')->with('success', 'Transaksi Tindakan deleted successfully.');
    }
}
