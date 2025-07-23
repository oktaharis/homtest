<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungan = Kunjungan::with(['pasien', 'user'])->paginate(10);
        return view('transaksi.kunjungan.index', compact('kunjungan'));
    }

    public function create()
    {
        $pasien = Pasien::paginate(10);
        $dokter = User::where('role', 'dokter')->get();
        return view('transaksi.kunjungan.create', compact('pasien', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_kunjungan' => 'required|date',
            'jenis_kunjungan' => 'required|in:rawat_jalan,konsultasi',
        ]);

        Kunjungan::create([
            'pasien_id' => $request->pasien_id,
            'user_id' => $request->user_id,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'jenis_kunjungan' => $request->jenis_kunjungan,
            'status' => 'pendaftaran',
        ]);

        return redirect()->route('transaksi.kunjungan.index')->with('success', 'Kunjungan created successfully.');
    }

    public function edit(Kunjungan $kunjungan)
    {
        // dd($kunjungan);
        $pasien = Pasien::paginate(10);
        $dokter = User::where('role', 'dokter')->get();
        return view('transaksi.kunjungan.edit', compact('kunjungan', 'pasien', 'dokter'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_kunjungan' => 'required|date',
            'jenis_kunjungan' => 'required|in:rawat_jalan,konsultasi',
            'status' => 'required|in:pendaftaran,selesai,dibayar',
        ]);

        $kunjungan->update($request->only(['pasien_id', 'user_id', 'tanggal_kunjungan', 'jenis_kunjungan', 'status']));

        return redirect()->route('transaksi.kunjungan.index')->with('success', 'Kunjungan updated successfully.');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();
        return redirect()->route('transaksi.kunjungan.index')->with('success', 'Kunjungan deleted successfully.');
    }
}
