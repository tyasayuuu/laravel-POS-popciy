@extends('layouts.header')
@section('content')

<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0 text-white">Daftar Kategori 🍦</h3>
                <button class="btn btn-light text-primary" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="resetForm()">
                    <i class="fas fa-plus"></i> Tambah Kategori
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Biaya Tambahan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($categories as $index => $c)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $c->name }}</td>
                            <td class="text-center">{{ $c->biaya_tambahan }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning edit-btn text-white"
                                    data-id="{{ $c->id }}"
                                    data-name="{{ $c->name }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#categoryModal">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('kategori.destroy', $c->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn">
                                        <i class="fas fa-trash"></i>
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

<!-- Modal Tambah & Edit -->
<!-- Modal Tambah & Edit -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitle">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="categoryId">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="biaya_tambahan" class="form-label">Biaya Tambahan (Rp)</label>
                        <input type="number" class="form-control" name="biaya_tambahan" value="{{ old('biaya_tambahan', $category->biaya_tambahan ?? 0) }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SweetAlert & Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function resetForm() {
        document.getElementById("modalTitle").textContent = "Tambah Kategori";
        document.getElementById("categoryId").value = "";
        document.getElementById("categoryName").value = "";
        document.getElementById("categoryForm").setAttribute("action", "/kategori");

        // Hapus input method PUT jika ada
        let methodInput = document.querySelector("input[name='_method']");
        if (methodInput) methodInput.remove();
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Event listener untuk tombol Edit
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function() {
                let categoryId = this.getAttribute("data-id");
                let categoryName = this.getAttribute("data-name");

                document.getElementById("modalTitle").textContent = "Edit Kategori";
                document.getElementById("categoryId").value = categoryId;
                document.getElementById("categoryName").value = categoryName;
                document.getElementById("categoryForm").setAttribute("action", `/kategori/${categoryId}`);

                // Tambahkan method PUT untuk Edit
                let methodInput = document.createElement("input");
                methodInput.setAttribute("type", "hidden");
                methodInput.setAttribute("name", "_method");
                methodInput.setAttribute("value", "PUT");
                document.getElementById("categoryForm").appendChild(methodInput);
            });
        });

        // Event listener untuk tombol Hapus dengan SweetAlert
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function() {
                let form = this.closest(".delete-form");

                Swal.fire({
                    title: "Apakah Anda yakin?",
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

        // SweetAlert untuk notifikasi sukses

    });
</script>


@endsection
