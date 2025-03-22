@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container py-4">
        <h2 class="mb-4">Tambah Transaksi</h2>
        <a href="{{ route('transaksi.index') }}" class="btn btn-outline-light mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card" style="border-radius: 10px; padding: 20px;">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer" class="form-label">Nama Customer</label>
                    <input type="text" name="customer" id="customer" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="produk_id" class="form-label">Pilih Produk</label>
                    <select name="produk_id" id="produk_id" class="form-select  ">
                        @foreach ($produk as $item)
                            <option value="{{ $item->id }}" data-harga="{{ $item->price }}">
                                {{ $item->name }} - Rp {{ number_format($item->price) }} (Stok: {{ $item->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control " min="1" required>
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Total Harga</label>
                    <input type="text" name="total" id="total" class="form-control " readonly>
                </div>

                <button type="submit" class="btn btn-outline-success w-100">
                    <i class="fas fa-save"></i> Simpan Transaksi
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produkSelect = document.querySelector('select[name="produk_id"]');
        const jumlahInput = document.querySelector('input[name="jumlah"]');
        const totalHargaInput = document.querySelector('input[name="total"]');

        function updateTotalHarga() {
            const harga = produkSelect.options[produkSelect.selectedIndex].dataset.harga || 0;
            const jumlah = jumlahInput.value || 0;
            totalHargaInput.value = 'Rp ' + (harga * jumlah).toLocaleString('id-ID');
        }

        produkSelect.addEventListener('change', updateTotalHarga);
        jumlahInput.addEventListener('input', updateTotalHarga);
    });
</script>
@endsection
