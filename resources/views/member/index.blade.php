@extends('layouts.header')

@section('content')
<div class="content-body">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark" style="font-size: 20px;">Daftar Member</h2>
            <a href="{{ route('member.create') }}" class="btn btn-sm btn-dark shadow">
                <i class="fas fa-user-plus"></i>
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-lg">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="bg-dark text-white text-center table-bordered">
                        <tr>
                            <th class="text-center" style="font-size: 14px;">Kode Member</th>
                            <th class="text-center" style="font-size: 14px;">Nama</th>
                            <th class="text-center" style="font-size: 14px;">Telepon</th>
                            <th class="text-center" style="font-size: 14px;">Alamat</th>
                            <th class="text-center" style="font-size: 14px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $member)
                            <tr class="text-center text-dark" style="font-size: 12px;">
                                <td><span class="fw-semibold">{{ $member->kode_member }}</span></td>
                                <td class="fw-semibold">{{ $member->nama }}</td>
                                <td class="fw-semibold text-center">{{ $member->telepon ?? '-' }}</td>
                                <td class="fw-semibold">{{ $member->alamat ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('member.destroy', $member->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if(collect($member)->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4" style="font-size: 12px;">
                                    <i class="fas fa-user-slash fa-2x"></i> <br>
                                    <span>Belum ada member yang terdaftar.</span>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
