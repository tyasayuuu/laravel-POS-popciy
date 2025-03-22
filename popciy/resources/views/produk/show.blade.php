@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <h2 class="mb-4 text-center fw-bold" style="font-size: 28px;">Detail Produk</h2>

        <div class="card shadow-lg mx-auto p-3" style="max-width: 700px; border-radius: 12px;">
            <div class="card-body">
                <h3 class="card-title text-primary fw-bold" style="font-size: 24px;">{{ $produk->name }}</h3>
                <hr>
                <p class="card-text" style="font-size: 18px;"><strong>Harga:</strong> <span class="text-success fw-bold">Rp{{ number_format($produk->price, 2, ',', '.') }}</span></p>
                <p class="card-text" style="font-size: 18px;"><strong>Stok:</strong>
                    <span class="badge bg-warning text-dark px-2 py-1" style="font-size: 16px;">{{ $produk->stock }}</span>
                </p>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary px-4 py-2" style="font-size: 18px;">← Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
