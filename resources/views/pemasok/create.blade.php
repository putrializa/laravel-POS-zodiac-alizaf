@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-5">
        <div class="card shadow-lg p-4 mx-auto" style="max-width: 600px;">
            <h2 class="text-center mb-4 fw-bold">Tambah Pemasok</h2>
            <form action="{{ route('pemasok.store') }}" method="POST">
                @csrf
                {{-- Nama Pemasok --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Pemasok</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           placeholder="Masukkan nama pemasok..." required>
                </div>
                
                {{-- Kontak Pemasok --}}
                <div class="mb-3">
                    <label for="contact" class="form-label fw-bold">Kontak</label>
                    <input type="text" class="form-control" id="contact" name="contact" 
                           placeholder="Masukkan nomor telepon pemasok..." required>
                </div>
                
                {{-- Alamat Pemasok --}}
                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" 
                              placeholder="Masukkan alamat pemasok..." required></textarea>
                </div>
                
                {{-- Tombol Simpan (Hitam) --}}
                <button type="submit" class="btn btn-dark w-100 fw-bold">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
