<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Member;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $produk = Product::where('stock', '>', 0)->get();
        $customer = Customer::all();
        $member = Member::all();
        $categories = Category::all(); // Ambil kategori
        return view('transaksi.create', compact('produk', 'customer', 'member', 'categories'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $transaksi = Transaksi::create([
                'kode_transaksi' => 'POPCY' . time(),
                'customer_name' => $request->customer_name,
                'total' => $request->total
            ]);

            foreach ($request->produk_id as $key => $produk_id) {
                $produk = Product::find($produk_id);
                $kategori = Category::find($request->kategori_id[$key]); // Ambil kategori yang dipilih
                $biaya_tambahan = $kategori ? $kategori->biaya_tambahan : 0;

                if (!$produk) {
                    return back()->with('error', 'Produk tidak ditemukan.');
                }

                if ($produk->stock < $request->jumlah[$key]) {
                    return back()->with('error', 'Stok tidak cukup untuk produk ' . $produk->nama);
                }

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'product_id' => $produk_id,
                    'category_id' => $kategori ? $kategori->id : null,
                    'jumlah' => $request->jumlah[$key],
                    'harga' => $request->harga[$key] + $biaya_tambahan,
                    'subtotal' => ($request->harga[$key] + $biaya_tambahan) * $request->jumlah[$key],
                ]);

                // Kurangi stok produk
                $produk->stock -= $request->jumlah[$key];
                $produk->save();
            }

            DB::commit();

            return redirect()->route('transaksi.nota', ['id' => $transaksi->id])
                ->with('success', 'Transaksi berhasil!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function cetakNota($id)
    {
        $transaksi = Transaksi::with('detail.produk.category')->findOrFail($id);

        return view('transaksi.nota', compact('transaksi'));
    }

    // Tambahan: Menampilkan detail transaksi
    public function show($id)
    {
        $transaksi = Transaksi::with('detail.produk.category')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    // Tambahan: Menghapus transaksi beserta detailnya
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $transaksi = Transaksi::findOrFail($id);
            DetailTransaksi::where('transaksi_id', $id)->delete();
            $transaksi->delete();
            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus transaksi: ' . $e->getMessage());
        }
    }

    public function getChartData()
    {
        $data = Transaksi::selectRaw('DATE(created_at) as tanggal, COUNT(id) as jumlah_transaksi, SUM(total) as total_pendapatan')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'ASC')
            ->get();

        return response()->json($data);
    }
}
