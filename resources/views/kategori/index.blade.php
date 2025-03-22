@extends('layouts.header')
@section('content')

<div class="content-body">
    <div class="container mt-4">
        <div class="card shadow-lg rounded-lg">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-white">Daftar Kategori</h5>
                <button class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#categoryModal" id="addCategoryBtn">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $c)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $c->name }}</td>
                            <td>
                                <button class="btn btn-secondary edit-btn" data-id="{{ $c->id }}" data-name="{{ $c->name }}" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('kategori.destroy', $c->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn">
                                        <i class="fas fa-trash"></i>
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

<!-- Modal Tambah & Edit -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="modalTitle">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod">
                <div class="modal-body">
                    <input type="hidden" name="id" id="categoryId">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categoryForm = document.getElementById("categoryForm");
        const categoryModalTitle = document.getElementById("modalTitle");
        const categoryIdField = document.getElementById("categoryId");
        const categoryNameField = document.getElementById("categoryName");
        const formMethodField = document.getElementById("formMethod");

        // Reset Form untuk Tambah Data
        document.getElementById("addCategoryBtn").addEventListener("click", function() {
            categoryModalTitle.textContent = "Tambah Kategori";
            categoryForm.reset();
            categoryIdField.value = "";
            categoryForm.setAttribute("action", "/kategori");

            if (formMethodField) formMethodField.value = "POST";
        });

        // Event delegation untuk tombol Edit
        document.body.addEventListener("click", function(event) {
            if (event.target.closest(".edit-btn")) {
                let button = event.target.closest(".edit-btn");
                let categoryId = button.getAttribute("data-id");
                let categoryName = button.getAttribute("data-name");

                categoryModalTitle.textContent = "Edit Kategori";
                categoryIdField.value = categoryId;
                categoryNameField.value = categoryName;
                categoryForm.setAttribute("action", `/kategori/${categoryId}`);

                formMethodField.value = "PUT";
            }
        });

        // Event delegation untuk tombol Delete
        document.body.addEventListener("click", function(event) {
            if (event.target.closest(".delete-btn")) {
                let form = event.target.closest(".delete-form");
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        });
    });
</script>

@endsection
