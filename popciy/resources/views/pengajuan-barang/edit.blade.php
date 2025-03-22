@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center fw-bold">Edit Pengajuan Barang</h2>

            <form action="{{ route('pengajuan-barang.update', $pengajuan->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
                    <input type="text" class="form-control" name="nama_pengaju" value="{{ $pengajuan->nama_pengaju }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="{{ $pengajuan->nama_barang }}" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                    <input type="date" class="form-control" name="tanggal_pengajuan"
                        value="{{ $pengajuan->tanggal_pengajuan->format('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" class="form-control" name="qty" value="{{ $pengajuan->qty }}" required>
                </div>
                <button type="submit" class="btn btn-primary fw-bold">Update</button>
                <a href="{{ route('pengajuan-barang.index') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>

@endsection
