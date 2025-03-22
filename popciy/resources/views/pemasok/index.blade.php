@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center fw-bold" style="font-size: 28px;">Daftar Pemasok</h2>

            <div class="text-end">
                <a href="{{ route('pemasok.create') }}" class="btn btn-primary mb-3 px-4 py-2" style="font-size: 18px;">
                    <i class="fas fa-user-plus"></i>
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white text-center">
                        <tr style="font-size: 15px;">
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kontak</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pemasok as $index => $p)
                            <tr style="font-size: 16px;" >
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $p->name }}</td>
                                <td class="text-center">{{ $p->contact ?? '-' }}</td>
                                <td>{{ $p->address ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('pemasok.show', $p->id) }}" class="btn btn-info btn-sm px-3 py-1" style="font-size: 15px;">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pemasok.edit', $p->id) }}" class="btn btn-warning btn-sm px-3 py-1 text-white" style="font-size: 15px;">
                                    <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pemasok.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3 py-1" style="font-size: 15px;">
                                        <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted" style="font-size: 16px;">Belum ada pemasok</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
