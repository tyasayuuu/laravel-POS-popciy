@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-lg p-4 mx-auto" style="max-width: 600px;">
            <h2 class="text-center mb-4">Tambah Pemasok</h2>
            <form action="{{ route('pemasok.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Pemasok</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label fw-bold">Kontak</label>
                    <input type="text" class="form-control" id="contact" name="contact">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
