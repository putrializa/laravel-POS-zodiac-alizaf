@extends('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center fw-bold">Daftar Pembelian</h2>

        {{-- Tombol Tambah Pembelian --}}
        <div class="text-end mb-3">
            <a href="{{ route('pembelian.create') }}" class="btn btn-dark fw-bold">+ Tambah Pembelian</a>
        </div>

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tabel Pembelian --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th class="fw-bold">No</th>
                        <th class="fw-bold">Pemasok</th>
                        <th class="fw-bold">Tanggal</th>
                        <th class="fw-bold">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelian as $index => $pm)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pm->pemasok->name }}</td>
                            <td>{{ date('d M Y', strtotime($pm->tanggal)) }}</td>
                            <td>Rp {{ number_format($pm->total_harga, 2, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted">Belum ada pembelian</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
