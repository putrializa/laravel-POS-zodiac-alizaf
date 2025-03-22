@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center fw-bold" style="font-size: 28px;">Daftar Pemasok</h2>

            {{-- Tombol Tambah Pemasok --}}
            <div class="text-end">
                <a href="{{ route('pemasok.create') }}" class="btn btn-dark mb-3 px-4 py-2 fw-bold" style="font-size: 18px;">
                    +
                </a>
            </div>

            {{-- Notifikasi sukses --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Tabel Pemasok --}}
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-dark text-white">
                        <tr style="font-size: 15px;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pemasok as $index => $p)
                            <tr style="font-size: 16px;">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->contact ?? '-' }}</td>
                                <td>{{ $p->address ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('pemasok.show', $p->id) }}" class="btn btn-secondary btn-sm px-3 py-1" style="font-size: 15px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pemasok.edit', $p->id) }}" class="btn btn-warning btn-sm px-3 py-1 text-white" style="font-size: 15px;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pemasok.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-3 py-1" style="font-size: 15px;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted" style="font-size: 16px;">Belum ada pemasok</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
