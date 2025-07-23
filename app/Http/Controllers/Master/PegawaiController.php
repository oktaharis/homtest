<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->paginate(10);
        return view('master.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $users = User::whereIn('role', ['petugas', 'dokter', 'kasir'])->get();
        return view('master.pegawai.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:pegawai,user_id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        Pegawai::create($request->only(['user_id', 'nama', 'jabatan']));

        return redirect()->route('master.pegawai.index')->with('success', 'Pegawai created successfully.');
    }

    public function edit(Pegawai $pegawai)
    {
        $users = User::whereIn('role', ['petugas', 'dokter', 'kasir'])->get();
        return view('master.pegawai.edit', compact('pegawai', 'users'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:pegawai,user_id,' . $pegawai->id,
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $pegawai->update($request->only(['user_id', 'nama', 'jabatan']));

        return redirect()->route('master.pegawai.index')->with('success', 'Pegawai updated successfully.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('master.pegawai.index')->with('success', 'Pegawai deleted successfully.');
    }
}
