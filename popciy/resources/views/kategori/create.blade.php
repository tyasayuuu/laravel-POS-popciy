@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-white">Tambah Kategori 🍦</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama kategori..." required>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>  Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

