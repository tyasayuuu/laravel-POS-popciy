@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4">📜 Detail Transaksi</h2>
            <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
            <p><strong>Pelanggan:</strong> {{ $transaksi->customer_name }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($transaksi->total, 0, ',', '.') }}</p>
            <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y') }}</p>

            <h4 class="mt-4">🛒 Produk yang Dibeli:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->detail as $detail)
                    <tr>
                        <td>{{ $detail->produk->name }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @php
            $grand_total = $transaksi->total;
            @endphp

            <h4 class="mt-4">🧾 Rincian Pembayaran:</h4>
            <table class="table">
                <tr>
                    <td><strong>Grand Total</strong></td>
                    <td><strong>Rp {{ number_format($grand_total, 0, ',', '.') }}</strong></td>
                </tr>
            </table>

            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3 text-white">Kembali</a>
        </div>
    </div>
</div>
@endsection
