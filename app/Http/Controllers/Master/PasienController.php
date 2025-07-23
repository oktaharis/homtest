<?php
namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::with('wilayah')->paginate(10)->withQueryString();
        return view('master.pasien.index', compact('pasien'));
    }

    public function create()
    {
        $wilayah = Wilayah::where('tipe', 'kabupaten')->get();
        return view('master.pasien.create', compact('wilayah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'wilayah_id' => 'required|exists:wilayah,id',
            'tanggal_lahir' => 'required|date|before:today',
        ]);

        Pasien::create($request->only(['nama', 'alamat', 'wilayah_id', 'tanggal_lahir']));

        return redirect()->route('master.pasien.index')->with('success', 'Pasien created successfully.');
    }

    public function edit(Pasien $pasien)
    {
        $wilayah = Wilayah::where('tipe', 'kabupaten')->get();
        return view('master.pasien.edit', compact('pasien', 'wilayah'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'wilayah_id' => 'required|exists:wilayah,id',
            'tanggal_lahir' => 'required|date|before:today',
        ]);

        $pasien->update($request->only(['nama', 'alamat', 'wilayah_id', 'tanggal_lahir']));

        return redirect()->route('master.pasien.index')->with('success', 'Pasien updated successfully.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('master.pasien.index')->with('success', 'Pasien deleted successfully.');
    }
}