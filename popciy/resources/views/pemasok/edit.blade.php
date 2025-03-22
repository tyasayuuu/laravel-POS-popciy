@extends('layouts.header')

@section('content')
<div class="container mt-4">
    <h2>Edit Pemasok</h2>
    <a href="{{ route('pemasok.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Pemasok</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pemasok->name }}" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $pemasok->contact }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address">{{ $pemasok->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
