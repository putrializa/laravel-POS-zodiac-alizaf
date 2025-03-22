@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <h2 class="mb-4 text-center fw-bold">Detail Produk</h2>

        <div class="card shadow-lg mx-auto p-4" style="max-width: 700px; border-radius: 12px;">
            <div class="card-body">
                <h3 class="card-title text-dark fw-bold">{{ $produk->name }}</h3>
                <hr>
                <p class="card-text"><strong>Harga:</strong> 
                    <span class="text-success fw-bold">Rp{{ number_format($produk->price, 0, ',', '.') }}</span>
                </p>
                <p class="card-text"><strong>Stok:</strong> 
                    <span class="badge bg-warning text-dark px-2 py-1">{{ $produk->stock }}</span>
                </p>
                <p class="card-text"><strong>Kategori:</strong> 
                    <span class="badge bg-secondary text-white px-2 py-1">
                        {{ $produk->category->name ?? 'Tidak ada kategori' }}
                    </span>
                </p>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('produk.index') }}" class="btn btn-dark px-4 py-2">← Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
