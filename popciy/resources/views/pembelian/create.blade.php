@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-3">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4">Tambah Pembelian</h2>
            <form action="{{ route('pembelian.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                    <input type="date" class="form-control" name="tanggal_pembelian" required>
                </div>
                <div class="mb-3">
                    <label for="pemasok_id" class="form-label">Pemasok</label>
                    <select class="form-control" name="pemasok_id" required>
                        @foreach($pemasok as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <h4 class="mt-4">Produk</h4>
                <div id="produk-container">
                    <div class="produk-group border p-3 rounded mb-2">
                        <input type="text" name="produk[0][nama_produk]" class="form-control mb-2" placeholder="Nama Produk" required>
                        <input type="number" name="produk[0][jumlah]" class="form-control mb-2" placeholder="Jumlah" required>
                        <input type="number" name="produk[0][harga_beli]" class="form-control" placeholder="Harga Beli" required>
                    </div>
                </div>

                <!-- Tombol sejajar -->
                <div class="justify-content-end mt-3">
                    <button type="button" class="btn btn-primary" onclick="tambahProduk()">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="submit" class="btn btn-danger ms-2">
                        <i class="fas fa-save"></i> 
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
let index = 1;
function tambahProduk() {
    let container = document.getElementById('produk-container');
    let newGroup = document.createElement('div');
    newGroup.classList.add('produk-group', 'border', 'p-3', 'rounded', 'mb-2');
    newGroup.innerHTML = `
        <input type="text" name="produk[${index}][nama_produk]" class="form-control mb-2" placeholder="Nama Produk" required>
        <input type="number" name="produk[${index}][jumlah]" class="form-control mb-2" placeholder="Jumlah" required>
        <input type="number" name="produk[${index}][harga_beli]" class="form-control" placeholder="Harga Beli" required>
    `;
    container.appendChild(newGroup);
    index++;
}
</script>
@endsection
