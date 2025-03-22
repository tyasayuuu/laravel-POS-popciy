@extends('layouts.header')
@section('content')

<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0 text-white">Daftar Produk 🍦</h3>
                <a href="{{ route('produk.create') }}" class="btn btn-light text-primary">
                    <i class="fas fa-plus"></i> Tambah Produk
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-striped table-bordered" style="font-size: 16px;">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th class="text-center" style="width: 5%;">Id</th>
                            <th class="text-center" style="width: 25%;">Nama</th>
                            <th class="text-center" style="width: 15%;">Harga</th>
                            <th class="text-center" style="width: 10%;">Stok</th>
                            <th class="text-center" style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                        <tr>
                            <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $p->name }}</td>
                            <td class="text-end fw-semibold text-center">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                            <td class="text-center fw-semibold">{{ $p->stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('produk.show', $p->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-sm btn-warning text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $p->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert dan FontAwesome -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function() {
            let form = this.closest(".delete-form");

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
