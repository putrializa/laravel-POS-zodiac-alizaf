@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-dark text-white">
                <h4 class="fw-bold mb-0 text-white" style="font-size: 18px;">
                    <i class="fas fa-user-plus text-white"></i> Tambah Member
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('member.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark" style="font-size: 14px;">
                            <i class="fas fa-user"></i> Nama
                        </label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required style="font-size: 12px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark" style="font-size: 14px;">
                            <i class="fas fa-phone"></i> Telepon
                        </label>
                        <input type="text" name="telepon" class="form-control" placeholder="Masukkan No. Telepon" style="font-size: 12px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark" style="font-size: 14px;">
                            <i class="fas fa-map-marker-alt"></i> Alamat
                        </label>
                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" style="font-size: 12px;"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark btn-sm px-4">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
