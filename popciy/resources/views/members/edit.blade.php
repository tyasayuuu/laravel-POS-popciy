@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-primary">Edit Member</h2>

            <form action="{{ route('members.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $member->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ $member->telepon }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ $member->alamat }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
