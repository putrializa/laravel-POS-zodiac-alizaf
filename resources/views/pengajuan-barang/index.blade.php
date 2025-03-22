@extends('layouts.header')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center fw-bold">Pengajuan Barang</h2>

        <div class="text-end mb-3">
            <a href="{{ route('pengajuan-barang.create') }}" class="btn btn-dark fw-bold">+ Tambah Pengajuan</a>
            <a href="{{ route('pengajuan-barang.export.excel') }}" class="btn btn-success fw-bold">Export xls</a>
            <a href="{{ route('pengajuan-barang.export.pdf') }}" class="btn btn-danger fw-bold">Export pdf</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table id="pengajuanTable" class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                <tr>
                    <th class="fw-bold">No</th>
                    <th class="fw-bold">Nama Pengaju</th>
                    <th class="fw-bold">Nama Barang</th>
                    <th class="fw-bold">Tanggal Pengajuan</th>
                    <th class="fw-bold">Qty</th>
                    <th class="fw-bold">Terpenuhi?</th>
                    <th class="fw-bold">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pengajuan as $i => $p)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $p->nama_pengaju }}</td>
                        <td>{{ $p->nama_barang }}</td>
                        <td>{{ $p->tanggal_pengajuan->format('d/m/Y') }}</td>
                        <td>{{ $p->qty }}</td>
                        <td>
                            <form action="{{ route('pengajuan-barang.toggle', $p->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-check form-switch d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" role="switch" onchange="this.form.submit()" {{ $p->terpenuhi ? 'checked' : '' }}>
                                </div>
                            </form>
                        </td>                        

                        

                        <td>
                            <a href="{{ route('pengajuan-barang.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST" action="{{ route('pengajuan-barang.destroy', $p->id) }}" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#pengajuanTable').DataTable();
    });
</script>



@endsection