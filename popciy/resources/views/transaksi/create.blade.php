@extends('layouts.header')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow p-4">
            <h3 class="mb-4"><i class="fas fa-shopping-cart"></i> Tambah Transaksi</h3>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="member_id" class="form-label">Pelanggan</label>
                    <select class="form-control" name="member_id" id="member_id">
                        <option value="0" data-nama="Umum">Umum</option>
                        @foreach($member as $m)
                            <option value="{{ $m->id }}" data-nama="{{ $m->nama }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="customer_name" id="customer_name" value="Umum">

                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="produk-list">
                            <tr>
                                <td>
                                    <select name="produk_id[]" class="form-control form-control-sm produk" required>
                                        <option value="">Pilih Produk</option>
                                        @foreach($produk as $item)
                                            <option value="{{ $item->id }}" data-harga="{{ $item->price }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="kategori_id[]" class="form-control form-control-sm kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $c)
                                            <option value="{{ $c->id }}" data-biaya="{{ $c->biaya_tambahan }}">
                                                {{ $c->name }} (+Rp {{ number_format($c->biaya_tambahan, 0, ',', '.') }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="harga[]" class="form-control form-control-sm harga text-center" readonly></td>
                                <td><input type="number" name="jumlah[]" class="form-control form-control-sm jumlah text-center" value="1" min="1"></td>
                                <td><input type="number" name="subtotal[]" class="form-control form-control-sm subtotal text-center" readonly></td>
                                <td>
                                    <button type="button" class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn btn-primary mb-3" id="tambah-produk">
                    <i class="fas fa-plus"></i> Tambah Produk
                </button>

                <div class="mb-3">
                    <label class="form-label fw-bold">Total Bayar</label>
                    <input type="number" name="total" id="total" class="form-control fw-bold text-success text-center" readonly>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save"></i> Simpan Transaksi
                </button>
            </form>
        </div>
    </div>
</div>


<script>
document.getElementById('member_id').addEventListener('change', function () {
    let selectedOption = this.options[this.selectedIndex];
    let namaPelanggan = selectedOption.getAttribute('data-nama') || 'Umum';
    document.getElementById('customer_name').value = namaPelanggan;
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('tambah-produk').addEventListener('click', function () {
            let row = document.querySelector('#produk-list tr').cloneNode(true);

            row.querySelector('.produk').value = "";
            row.querySelector('.kategori').value = "";
            row.querySelector('.harga').value = "";
            row.querySelector('.jumlah').value = 1;
            row.querySelector('.subtotal').value = "";

            document.querySelector('#produk-list').appendChild(row);
        });

        document.addEventListener('change', function (event) {
            let row = event.target.closest('tr');

            if (event.target.classList.contains('produk')) {
                let harga = parseInt(event.target.selectedOptions[0].getAttribute('data-harga')) || 0;
                let kategoriSelect = row.querySelector('.kategori');
                let biayaTambahan = kategoriSelect ? parseInt(kategoriSelect.selectedOptions[0].getAttribute('data-biaya')) || 0 : 0;

                let hargaTotal = harga + biayaTambahan;
                row.querySelector('.harga').value = hargaTotal;
                row.querySelector('.subtotal').value = hargaTotal * row.querySelector('.jumlah').value;
                hitungTotal();
            }

            if (event.target.classList.contains('kategori')) {
                let harga = parseInt(row.querySelector('.produk').selectedOptions[0].getAttribute('data-harga')) || 0;
                let biayaTambahan = parseInt(event.target.selectedOptions[0].getAttribute('data-biaya')) || 0;

                let hargaTotal = harga + biayaTambahan;
                row.querySelector('.harga').value = hargaTotal;
                row.querySelector('.subtotal').value = hargaTotal * row.querySelector('.jumlah').value;
                hitungTotal();
            }

            if (event.target.classList.contains('jumlah')) {
                let harga = parseInt(row.querySelector('.harga').value) || 0;
                row.querySelector('.subtotal').value = harga * event.target.value;
                hitungTotal();
            }
        });

        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove')) {
                event.target.closest('tr').remove();
                hitungTotal();
            }
        });

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('.subtotal').forEach(function (el) {
                total += parseInt(el.value || 0);
            });
            document.getElementById('total').value = total;
        }
    });

</script>

@endsection
