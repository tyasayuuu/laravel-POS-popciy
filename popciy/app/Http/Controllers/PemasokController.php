<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    // 1. Tampilkan semua Pemasok
    public function index()
    {
        $pemasok = Pemasok::all();
        return view('pemasok.index', compact('pemasok'));
    }

    // 2. Tampilkan form tambah Pemasok
    public function create()
    {
        return view('pemasok.create');
    }

    // 3. Simpan data Pemasok baru
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Pemasok::create($request->all());

        return redirect()->route('pemasok.index')
                         ->with('success', 'Pemasok berhasil ditambahkan!');
    }

    // 4. Tampilkan detail Pemasok
    public function show($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.show', compact('pemasok'));
    }

    // 5. Tampilkan form edit Pemasok
    public function edit($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        return view('pemasok.edit', compact('pemasok'));
    }

    // 6. Update data Pemasok
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $pemasok = Pemasok::findOrFail($id);
        $pemasok->update($request->all());

        return redirect()->route('pemasok.index')
                         ->with('success', 'Pemasok berhasil diperbarui!');
    }

    // 7. Hapus data Pemasok
    public function destroy($id)
    {
        $pemasok = Pemasok::findOrFail($id);
        $pemasok->delete();

        return redirect()->route('pemasok.index')
                         ->with('success', 'Pemasok berhasil dihapus!');
    }
}
