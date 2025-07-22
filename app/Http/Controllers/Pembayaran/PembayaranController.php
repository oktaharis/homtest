<?php

namespace App\Http\Controllers\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('kunjungan.pasien')->get();
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
            'total_biaya' => 'required|numeric|min:0',
            'status' => 'required|in:belum_bayar,lunas',
            'tanggal_bayar' => 'nullable|date',
        ]);

        Pembayaran::create($request->only(['kunjungan_id', 'total_biaya', 'status', 'tanggal_bayar']));

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran created successfully.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $kunjungan = Kunjungan::where('status', 'selesai')->with('pasien')->get();
        return view('pembayaran.edit', compact('pembayaran', 'kunjungan'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungan,id',
            'total_biaya' => 'required|numeric|min:0',
            'status' => 'required|in:belum_bayar,lunas',
            'tanggal_bayar' => 'nullable|date',
        ]);

        $pembayaran->update($request->only(['kunjungan_id', 'total_biaya', 'status', 'tanggal_bayar']));

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran updated successfully.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran deleted successfully.');
    }
}
