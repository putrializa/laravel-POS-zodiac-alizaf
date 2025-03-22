@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card border rounded-lg">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Daftar Produk</h3>
                <a href="{{ route('produk.create') }}" class="btn btn-light text-dark">
                    <i class="fas fa-plus"></i> Tambah Produk
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" style="font-size: 16px;">
                    <thead class="text-center">
                        <tr class="table-dark">
                            <th style="width: 5%;">ID</th>
                            <th style="width: 25%;">Nama</th>
                            <th style="width: 15%;">Kategori</th>
                            <th style="width: 15%;">Harga</th>
                            <th style="width: 10%;">Stok</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                        <tr>
                            <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $p->name }}</td>
                            <td class="text-center">
                                <span class="badge bg-secondary text-white fs-6 px-3 py-2">
                                    {{ $p->category->name }}
                                </span>
                            </td>
                            <td class="text-end fw-semibold">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                            <td class="text-center fw-semibold">{{ $p->stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('produk.show', $p->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-sm btn-warning text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                        <i class="fas fa-trash-alt"></i>
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
</div>

<!-- Tambahin FontAwesome buat icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

@endsection
