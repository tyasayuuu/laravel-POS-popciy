@extends('layouts.header')
@section('title', 'Dashboard')
@section('content')

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Products Sold</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">1,290</h2>
                            <p class="text-white mb-0">Jan - {{ date('F Y') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Net Profit</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">$ 8541</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">New Customers</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Customer Satisfaction</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">99%</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk Grafik Penjualan -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-white">Grafik Penjualan Harian</h4>
                </div>
                <div class="card-body">
                    <canvas id="transaksiChart"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('transaksiChart').getContext('2d');
    var transaksiChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Jumlah Transaksi',
                    borderColor: 'blue',
                    data: [],
                    fill: false
                },
                {
                    label: 'Total Pendapatan',
                    borderColor: 'green',
                    data: [],
                    fill: false
                }
            ]
        }
    });

    function updateChart() {
        fetch('/api/transaksi/chart')
            .then(response => response.json())
            .then(data => {
                let labels = data.map(item => item.tanggal);
                let jumlahTransaksi = data.map(item => item.jumlah_transaksi);
                let totalPendapatan = data.map(item => item.total_pendapatan);

                transaksiChart.data.labels = labels;
                transaksiChart.data.datasets[0].data = jumlahTransaksi;
                transaksiChart.data.datasets[1].data = totalPendapatan;
                transaksiChart.update();
            });
    }

    setInterval(updateChart, 5000); // Update data setiap 5 detik
    updateChart(); // Load data awal
</script>
@endsection
