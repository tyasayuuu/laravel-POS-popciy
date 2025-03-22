<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\DetailPembelian;
use App\Models\Pemasok;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::with(['pemasok', 'pembelianDetails'])->get();
        return view('pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $pemasok = Pemasok::all();
        return view('pembelian.create', compact('pemasok'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'pemasok_id' => 'required|exists:pemasok,id',
            'produk' => 'required|array',
            'produk.*.nama_produk' => 'required|string',
            'produk.*.jumlah' => 'required|integer|min:1',
            'produk.*.harga_beli' => 'required|numeric|min:0',
        ]);

        $total_modal = 0;
        foreach ($request->produk as $produk) {
            $total_modal += $produk['jumlah'] * $produk['harga_beli'];
        }

        $pembelian = Pembelian::create([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'pemasok_id' => $request->pemasok_id,
            'total_modal' => $total_modal,
        ]);

        foreach ($request->produk as $produk) {
            DetailPembelian::create([
                'pembelian_id' => $pembelian->id,
                'nama_produk' => $produk['nama_produk'],
                'jumlah' => $produk['jumlah'],
                'harga_beli' => $produk['harga_beli'],
            ]);
        }

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pembelian = Pembelian::with(['pemasok', 'pembelianDetails'])->findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->pembelianDetails()->delete(); // Hapus detail pembelian dulu
        $pembelian->delete(); // Hapus pembelian utama

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus.');
    }
}
