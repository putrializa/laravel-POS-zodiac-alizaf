@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-dark" style="font-size: 20px;">Edit Member</h2>

            <form action="{{ route('member.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark" style="font-size: 14px;">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $member->nama }}" required style="font-size: 12px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark" style="font-size: 14px;">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ $member->telepon }}" style="font-size: 12px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark" style="font-size: 14px;">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" style="font-size: 12px;">{{ $member->alamat }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('member.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-dark btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
