@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0 text-white">Daftar Pembelian</h3>
                <a href="{{ route('pembelian.create') }}" class="btn btn-light">
                    <i class="fas fa-plus"></i> Tambah Pembelian
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Pemasok</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Total Modal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian as $item)
                        <tr>
                            <td class="text-center">{{ $item->tanggal_pembelian }}</td>
                            <td class="text-center">{{ $item->pemasok->name }}</td>
                            <td>
                                <ul>
                                    @foreach($item->pembelianDetails as $detail)
                                        <li>{{ $detail->nama_produk }} ({{ $detail->jumlah }}x)</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-end">Rp {{ number_format($item->total_modal, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('pembelian.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <form action="{{ route('pembelian.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah yakin ingin menghapus pembelian ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
