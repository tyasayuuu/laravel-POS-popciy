@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Daftar Member</h2>
            <a href="{{ route('members.create') }}" class="btn btn-lg btn-primary shadow">
                <i class="fas fa-user-plus"></i>
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-lg">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary text-white text-center table-bordered">
                        <tr>
                            <th class="text-center">Kode Member</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Telepon</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr class="text-center">
                                <td><span class="fw-semibold">{{ $member->kode_member }}</span></td>
                                <td class="fw-semibold">{{ $member->nama }}</td>
                                <td class="fw-semibold text-center">{{ $member->telepon ?? '-' }}</td>
                                <td class="fw-semibold">{{ $member->alamat ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($members->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-user-slash fa-2x"></i> <br>
                                    <span class="fs-5">Belum ada member yang terdaftar.</span>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
