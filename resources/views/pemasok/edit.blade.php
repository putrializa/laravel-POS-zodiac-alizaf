@extends('layouts.header')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold">Edit Pemasok</h2>
    
    {{-- Tombol Kembali --}}
    <a href="{{ route('pemasok.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    {{-- Form Edit Pemasok --}}
    <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama Pemasok --}}
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Pemasok</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ $pemasok->name }}" required>
        </div>

        {{-- Kontak Pemasok --}}
        <div class="mb-3">
            <label for="contact" class="form-label fw-bold">Kontak</label>
            <input type="text" class="form-control" id="contact" name="contact" 
                   value="{{ $pemasok->contact }}">
        </div>

        {{-- Alamat Pemasok --}}
        <div class="mb-3">
            <label for="address" class="form-label fw-bold">Alamat</label>
            <textarea class="form-control" id="address" name="address" 
                      rows="3">{{ $pemasok->address }}</textarea>
        </div>

        {{-- Tombol Update (Hitam) --}}
        <button type="submit" class="btn btn-dark fw-bold w-100">
            <i class="fas fa-save"></i> Update
        </button>
    </form>
</div>
@endsection
