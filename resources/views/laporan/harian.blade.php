@extends('layouts.header')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📊 Laporan Harian</h2>

    <table class="table table-bordered table-striped shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksiHariIni as $transaksi)
            <tr>
                <td>{{ $transaksi->kode_transaksi }}</td>
                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y') }}</td>
                <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">Belum ada transaksi hari ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4 p-3 bg-light border rounded shadow-sm">
        <h4>Total Pendapatan: <span class="text-success fw-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</span></h4>
    </div>

    <div class="mt-3">
        <a href="{{ route('laporan.export.pdf') }}" class="btn btn-primary">
            <i class="bi bi-file-earmark-pdf-fill"></i> Export PDF
        </a>
    </div>
</div>
@endsection
