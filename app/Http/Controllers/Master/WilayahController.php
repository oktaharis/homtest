<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::with('parent')->get();
        return view('master.wilayah.index', compact('wilayah'));
    }

    public function create()
    {
        $provinsi = Wilayah::where('tipe', 'provinsi')->get();
        return view('master.wilayah.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:provinsi,kabupaten',
            'parent_id' => 'nullable|exists:wilayah,id',
        ]);

        Wilayah::create($request->only(['nama', 'tipe', 'parent_id']));

        return redirect()->route('master.wilayah.index')->with('success', 'Wilayah created successfully.');
    }

    public function edit(Wilayah $wilayah)
    {
        $provinsi = Wilayah::where('tipe', 'provinsi')->get();
        return view('master.wilayah.edit', compact('wilayah', 'provinsi'));
    }

    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:provinsi,kabupaten',
            'parent_id' => 'nullable|exists:wilayah,id',
        ]);

        $wilayah->update($request->only(['nama', 'tipe', 'parent_id']));

        return redirect()->route('master.wilayah.index')->with('success', 'Wilayah updated successfully.');
    }

    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('master.wilayah.index')->with('success', 'Wilayah deleted successfully.');
    }
}
