<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi - Popciy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 450px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }
        .logo {
            width: 150px;
            display: block;
            margin: auto;
            margin-bottom: 10px;
        }
        h2 {
            margin: 5px 0;
            color: #d9534f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f0f0f0;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 15px;
        }
        .btn-print {
            margin-top: 15px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-print:hover {
            background: #0056b3;
        }
        @media print {
            .btn-print { display: none; }
            .container {
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="{{ asset('assets/images/popciy.png') }}" class="logo" alt="Logo Popciy">
        <h2>Popciy - Nota Transaksi</h2>
        <hr>
        <p><strong>Kode:</strong> {{ $transaksi->kode_transaksi }}</p>
        <p><strong>Pelanggan:</strong> {{ $transaksi->customer_name }}</p>

        <table>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            @foreach($transaksi->detail as $detail)
            <tr>
                <td>{{ $detail->produk->name }}</td>
                <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>

        {{-- Grand Total Tanpa Biaya Tambahan --}}
        <table>
            <tr>
                <td colspan="3" class="text-right"><strong>Grand Total</strong></td>
                <td><strong>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</strong></td>
            </tr>
        </table>

        <button class="btn-print" onclick="printNota()">Cetak Nota</button>
    </div>

    <script>
        function printNota() {
            window.print();
        }

        window.onafterprint = function () {
            window.location.href = "{{ route('transaksi.index') }}";
        };
    </script>

</body>
</html>
