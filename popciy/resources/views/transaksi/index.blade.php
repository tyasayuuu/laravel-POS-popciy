@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4">📋 Daftar Transaksi</h2>
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th class="text-center">Kode Transaksi</th>
                            <th class="text-center">Pelanggan</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $trx)
                        <tr class="text-center">
                            <td><strong>{{ $trx->kode_transaksi }}</strong></td>
                            <td>{{ $trx->customer_name }}</td>
                            <td class="text-success">Rp {{ number_format($trx->total, 0, ',', '.') }}</td>
                            <td>{{ $trx->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('transaksi.show', $trx->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data transaksi akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.closest('form').submit();
            }
        });
    });
});
</script>


@if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'Gagal!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'Coba Lagi'
        });
    </script>
@endif

@endsection
