<!-- resources/views/Page/JenisSampah/ListJenisSampah.blade.php -->

@extends('layouts.main')

@section('title')
    <title>List Jenis Sampah</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Table Jenis Sampah</h5>
                <a href="{{ route('jenis.create') }}" class="btn btn-primary">Tambah Jenis Sampah</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Sampah</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($jenissampah as $key => $jenis) <!-- Ganti variabel menjadi $jenissampah -->
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $jenis->jenis }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('jenis.edit', $jenis->id) }}"><i class="bx bx-edit-alt me-1"></i>Edit</a></li>
                                            <li>
                                                <form action="{{ route('jenis.destroy', $jenis->id) }}" method="post" id="delete-form-{{ $jenis->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="dropdown-item delete-btn" data-jenis-id="{{ $jenis->id }}">
                                                        <i class="bx bx-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
            // Sweet Alert for successful deletion

            document.addEventListener('DOMContentLoaded', function () {
        // Sweet Alert for successful addition
        let successMessage = "{{ session('success') }}";

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: successMessage,
            });
        }

            $('.delete-btn').on('click', function () {
                let jenisId = $(this).data('jenis-id');
                Swal.fire({
                    title: 'Anda  Ingin Menghapus?',
                    text: 'Data Tersebut Akan Terhapus',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete-form-' + jenisId).submit();
                    }
                });
            });
        });
    </script>
@endsection
