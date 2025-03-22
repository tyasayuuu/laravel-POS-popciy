@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="fw-bold mb-0 text-white"><i class="fas fa-user-plus text-white"></i>  Tambah Member</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fas fa-user"></i>  Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fas fa-phone"></i>  Telepon</label>
                        <input type="text" name="telepon" class="form-control" placeholder="Masukkan No. Telepon">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fas fa-map-marker-alt"></i>  Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
