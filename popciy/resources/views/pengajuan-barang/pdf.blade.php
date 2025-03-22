<!DOCTYPE html>
<html>
<head>
    <title>Export PDF Pengajuan Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Daftar Pengajuan Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengaju</th>
                <th>Nama Barang</th>
                <th>Tanggal Pengajuan</th>
                <th>Qty</th>
                <th>Terpenuhi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuan as $i => $p)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $p->nama_pengaju }}</td>
                    <td>{{ $p->nama_barang }}</td>
                    <td>{{ $p->tanggal_pengajuan->format('d/m/Y') }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ $p->terpenuhi ? 'Ya' : 'Tidak' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
