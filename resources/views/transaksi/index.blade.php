@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container py-4">
        <h2 class="mb-4 text-light">Daftar Transaksi</h2>

        <a href="{{ route('transaksi.create') }}" class="btn btn-dark mb-3">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Customer</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $t)
                    <tr>
                        <td>{{ $t->kode_transaksi }}</td>
                        <td>{{ $t->customer }}</td>
                        <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                        <td>{{ $t->created_at->format('d-m-Y H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
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
@endsection
