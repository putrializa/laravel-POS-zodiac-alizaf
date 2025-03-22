@extends('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center fw-bold">Edit Pembelian</h2>
        <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Pemasok</label>
                <select name="pemasok_id" class="form-control" required>
                    @foreach ($pemasok as $pemasok)
                        <option value="{{ $pemasok->id }}" {{ $pemasok->id == $pembelian->pemasok_id ? 'selected' : '' }}>{{ $pemasok->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $pembelian->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Harga</label>
                <input type="number" name="total_harga" class="form-control" step="0.01" value="{{ $pembelian->total_harga }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
