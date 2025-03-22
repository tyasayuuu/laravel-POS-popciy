@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detail Pembelian</h3>
            </div>
            <div class="card-body">
                <p><strong>Tanggal:</strong> {{ $pembelian->tanggal_pembelian }}</p>
                <p><strong>Pemasok:</strong> {{ $pembelian->pemasok->name }}</p>
                <p><strong>Total Modal:</strong> Rp {{ number_format($pembelian->total_modal, 2, ',', '.') }}</p>

                <h5>Produk yang Dibeli:</h5>
                <ul>
                    @foreach($pembelian->pembelianDetails as $detail)
                        <li>{{ $detail->nama_produk }} - {{ $detail->jumlah }}x (Rp {{ number_format($detail->harga_beli, 2, ',', '.') }})</li>
                    @endforeach
                </ul>

                <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
