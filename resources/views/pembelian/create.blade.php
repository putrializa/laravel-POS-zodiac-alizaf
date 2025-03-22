@extends('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center fw-bold">Tambah Pembelian</h2>
        <form action="{{ route('pembelian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Pemasok</label>
                <select name="pemasok_id" class="form-control" required>
                    @foreach ($pemasok as $pemasok)
                        <option value="{{ $pemasok->id }}">{{ $pemasok->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Harga</label>
                <input type="number" name="total_harga" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection