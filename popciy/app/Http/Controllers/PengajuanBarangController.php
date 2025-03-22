<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\PengajuanBarang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengajuanBarangExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;


class PengajuanBarangController extends Controller
{
    public function index()
    {
        $pengajuan = PengajuanBarang::all();
        return view('pengajuan-barang.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('pengajuan-barang.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_pengaju' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'tanggal_pengajuan' => 'required|date',
            'qty' => 'required|integer|min:1',
        ]);

        $pengajuan = PengajuanBarang::create($request->all());

        Log::info('Pengajuan barang dibuat', [
            'id' => Auth::id(),
            'nama_pengaju' => $pengajuan->nama_pengaju,
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'terpenuhi' => $pengajuan->terpenuhi,
            'timestamp' => now(),
        ]);

        return redirect()->route('pengajuan-barang.index')->with('success', 'Pengajuan berhasil ditambahkan');

        PengajuanBarang::create([
            'nama_pengaju' => $request->nama_pengaju,
            'nama_barang' => $request->nama_barang,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'qty' => $request->qty,
            'terpenuhi' => 0
        ]);

        return redirect()->route('pengajuan-barang.index')->with('success', 'Pengajuan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengajuan = PengajuanBarang::findOrFail($id);
        return view('pengajuan-barang.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pengaju' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'tanggal_pengajuan' => 'required|date',
            'qty' => 'required|integer|min:1',
        ]);

        $pengajuan = PengajuanBarang::findOrFail($id);

        $pengajuan->update($request->only('nama_pengaju', 'nama_barang', 'tanggal_pengajuan', 'qty'));

        return redirect()->route('pengajuan-barang.index')->with('success', 'Pengajuan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanBarang::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('pengajuan-barang.index')->with('success', 'Pengajuan berhasil dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new PengajuanBarangExport, 'pengajuan-barang.xlsx');
    }

    public function exportPDF()
    {
        $pengajuan = PengajuanBarang::all();
        $pdf = Pdf::loadView('pengajuan-barang.pdf', compact('pengajuan'));
        return $pdf->download('pengajuan-barang.pdf');
    }

    public function toggle($id)
    {
        $pengajuan = PengajuanBarang::findOrFail($id);

        $pengajuan->terpenuhi = !$pengajuan->terpenuhi;
        
        $pengajuan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah!');
    }

}
