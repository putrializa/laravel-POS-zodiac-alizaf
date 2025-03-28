@extends('layouts.header')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card border p-4" style="max-width: 600px; width: 100%;">
        <h3 class="mb-4 text-center text-dark">Edit Produk</h3>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $produk->name }}" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label fw-bold">Kategori</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $produk->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Harga</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $produk->price }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label fw-bold">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $produk->stock }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('produk.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-dark">Update <i class="fas fa-save"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection
