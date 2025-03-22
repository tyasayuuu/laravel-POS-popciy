@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-white">Tambah Produk Baru 🍦</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('produk.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama produk..." required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-bold">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga..." required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label fw-bold">Stok</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan stok..." required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('produk.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                        <button type="submit" class="btn btn-info">Simpan  <i class="fas fa-arrow-right"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

