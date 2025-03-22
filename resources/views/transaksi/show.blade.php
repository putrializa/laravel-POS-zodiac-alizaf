@extends('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="card p-4 shadow" style="max-width: 500px; margin: auto; border: 1px dashed #333;">
        <h3 class="text-center mb-4">Bakery POS</h3>
        <hr>
        <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
        <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y H:i') }}</p>
        <p><strong>Pelanggan:</strong> {{ $transaksi->customer }}</p>
        <hr>

        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th class="text-end">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi->detail as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td class="text-end">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <p class="text-end fw-bold">Total: Rp {{ number_format($transaksi->total, 0, ',', '.') }}</p>

        <div class="text-center mt-4">
            <p>Terima kasih telah berbelanja!</p>
            <small>~ Bakery POS ~</small>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('transaksi.index') }}" class="btn btn-dark btn-sm">Kembali</a>
        </div>
        <div class="text-center mt-2">
            <button onclick="printNota()" class="btn btn-primary btn-sm">Print</button>
        </div>
        
    </div>
</div>
@endsection


