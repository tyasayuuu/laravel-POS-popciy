@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h2 class="mb-3 text-center">Detail Pemasok</h2>

            <div class="text-start">
                <a href="{{ route('pemasok.index') }}" class="btn btn-primary mb-3 text-white">
                    <i class="fas fa-arrow-left"></i> 
                </a>
            </div>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="bg-light" style="width: 30%;">Nama</th>
                        <td>{{ $pemasok->name }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Kontak</th>
                        <td>{{ $pemasok->contact ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">Alamat</th>
                        <td>{{ $pemasok->address ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
