@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center fw-bold">Pengajuan Barang</h2>

            <div class="text-end mb-3">
                <a href="{{ route('pengajuan-barang.create') }}" class="btn btn-secondary text-white fw-bold">+ Tambah Pengajuan</a>
                <a href="{{ route('pengajuan-barang.export.excel') }}" class="btn btn-primary fw-bold">Export xls</a>
                <a href="{{ route('pengajuan-barang.export.pdf') }}" class="btn btn-danger fw-bold">Export pdf</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="pengajuanTable" class="table table-bordered table-striped">
                    <thead class="bg-primary text-white text-center">
                    <tr>
                        <th class="text-center fw-bold">No</th>
                        <th class="text-center fw-bold">Nama Pengaju</th>
                        <th class="text-center fw-bold">Nama Barang</th>
                        <th class="text-center fw-bold">Tanggal Pengajuan</th>
                        <th class="text-center fw-bold">Qty</th>
                        <th class="text-center fw-bold">Terpenuhi?</th>
                        <th class="text-center fw-bold">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengajuan as $i => $p)
                        <tr>
                            <td class="text-center">{{ $i+1 }}</td>
                            <td class="text-center">{{ $p->nama_pengaju }}</td>
                            <td class="text-center">{{ $p->nama_barang }}</td>
                            <td class="text-center">{{ $p->tanggal_pengajuan->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $p->qty }}</td>
                            
                            <td>
                                <form class="text-center" action="{{ route('pengajuan-barang.toggle', $p->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label class="switch">
                                        <input type="checkbox" onchange="this.form.submit()" {{ $p->terpenuhi ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('pengajuan-barang.edit', $p->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('pengajuan-barang.destroy', $p->id) }}" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
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

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 20px;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }
    input:checked + .slider {
        background-color: #28a745;
    }
    input:checked + .slider:before {
        transform: translateX(20px);
    }
</style>

<script>
    $(document).ready(function () {
        $('#pengajuanTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "→",
                    "previous": "←"
                },
            }
        });
    });
</script>
@endsection
