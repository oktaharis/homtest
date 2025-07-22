<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('master.obat.index', compact('obat'));
    }

    public function create()
    {
        return view('master.obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Obat::create($request->only(['nama', 'harga', 'stok']));

        return redirect()->route('master.obat.index')->with('success', 'Obat created successfully.');
    }

    public function edit(Obat $obat)
    {
        return view('master.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $obat->update($request->only(['nama', 'harga', 'stok']));

        return redirect()->route('master.obat.index')->with('success', 'Obat updated successfully.');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('master.obat.index')->with('success', 'Obat deleted successfully.');
    }
}