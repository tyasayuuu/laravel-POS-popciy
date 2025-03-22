@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-warning text-white">
                <h4 class="mb-0 text-white">Update Kategori 🍦</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="name">Nama Kategori</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>


                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
