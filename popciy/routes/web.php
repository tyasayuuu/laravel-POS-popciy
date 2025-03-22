<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengajuanBarangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/api/transaksi/chart', [TransaksiController::class, 'getChartData']);


Route::resource('produk', ProductController::class);
Route::get('/produk/{id}', [ProductController::class, 'show']);


Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index'); // Menampilkan daftar kategori
Route::post('/kategori', [CategoryController::class, 'store'])->name('kategori.store'); // Simpan kategori baru
Route::put('/kategori/{kategori}', [CategoryController::class, 'update'])->name('kategori.update'); // Update kategori
Route::delete('/kategori/{kategori}', [CategoryController::class, 'destroy'])->name('kategori.destroy'); // Hapus kategori


Route::get('/pemasok', [PemasokController::class, 'index'])->name('pemasok.index'); // Menampilkan daftar pemasok
Route::get('/pemasok/create', [PemasokController::class, 'create'])->name('pemasok.create'); // Form tambah pemasok
Route::post('/pemasok', [PemasokController::class, 'store'])->name('pemasok.store'); // Simpan pemasok baru
Route::get('/pemasok/{id}', [PemasokController::class, 'show'])->name('pemasok.show'); // Detail pemasok
Route::get('/pemasok/{id}/edit', [PemasokController::class, 'edit'])->name('pemasok.edit'); // Form edit pemasok
Route::put('/pemasok/{id}', [PemasokController::class, 'update'])->name('pemasok.update'); // Update pemasok
Route::delete('/pemasok/{id}', [PemasokController::class, 'destroy'])->name('pemasok.destroy'); // Hapus pemasok

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/transaksi/{id}/cetak', [TransaksiController::class, 'cetakNota'])->name('transaksi.cetak');
Route::get('/transaksi/{id}/nota', [TransaksiController::class, 'cetakNota'])->name('transaksi.nota');

Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');


Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
Route::post('/pembelian', [PembelianController::class, 'store'])->name('pembelian.store');
Route::get('/pembelian/{id}', [PembelianController::class, 'show'])->name('pembelian.show');
Route::delete('/pembelian/{id}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');

Route::resource('pengajuan-barang', PengajuanBarangController::class);

Route::get('pengajuan-barang/export/excel', [PengajuanBarangController::class, 'exportExcel'])
    ->name('pengajuan-barang.export.excel');

Route::get('pengajuan-barang/export/pdf', [PengajuanBarangController::class, 'exportPdf'])
    ->name('pengajuan-barang.export.pdf');

Route::put('/pengajuan-barang/toggle/{id}', [PengajuanBarangController::class, 'toggle'])->name('pengajuan-barang.toggle');
