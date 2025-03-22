@extends('layouts.header')
@section('title', 'Dashboard')
@section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <i class="fas fa-chart-line"></i> Grafik Penjualan Harian
    </div>
    <div class="card-body">
        <canvas id="chartPenjualan" height="100"></canvas>
    </div>
</div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('{{ route('chart.data') }}')
        .then(response => response.json())
        .then(data => {
            const tanggal = data.map(item => item.tanggal);
            const jumlahTransaksi = data.map(item => item.jumlah_transaksi);
            const totalPendapatan = data.map(item => item.total_pendapatan);

            const ctx = document.getElementById('chartPenjualan').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: tanggal,
                    datasets: [
                        {
                            label: 'Jumlah Transaksi',
                            data: jumlahTransaksi,
                            borderColor: 'black',
                            backgroundColor: 'black',
                            fill: false,
                            tension: 0.3
                        },
                        {
                            label: 'Total Pendapatan',
                            data: totalPendapatan,
                            borderColor: 'green',
                            backgroundColor: 'green',
                            fill: false,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('❌ Gagal ambil data chart:', error);
        });
});

</script>
@endsection
