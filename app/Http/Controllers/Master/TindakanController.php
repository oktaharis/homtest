<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{

    public function index()
    {
        $tindakan = Tindakan::paginate(10);
        return view('master.tindakan.index', compact('tindakan'));
    }

    public function create()
    {
        return view('master.tindakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
        ]);

        Tindakan::create($request->only(['nama', 'biaya']));

        return redirect()->route('master.tindakan.index')->with('success', 'Tindakan created successfully.');
    }

    public function edit(Tindakan $tindakan)
    {
        return view('master.tindakan.edit', compact('tindakan'));
    }

    public function update(Request $request, Tindakan $tindakan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
        ]);

        $tindakan->update($request->only(['nama', 'biaya']));

        return redirect()->route('master.tindakan.index')->with('success', 'Tindakan updated successfully.');
    }

    public function destroy(Tindakan $tindakan)
    {
        $tindakan->delete();
        return redirect()->route('master.tindakan.index')->with('success', 'Tindakan deleted successfully.');
    }
}
