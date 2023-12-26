@extends('layouts.main')

@section('title')
    <title>List Satuan</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Table Satuan</h5>
                <a href="{{ route('satuan.create') }}" class="btn btn-primary">Tambah Satuan</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($satuans as $key => $satuan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $satuan->nama }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('satuan.edit', $satuan->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('satuan.destroy', $satuan->id) }}" method="post" id="delete-form-{{ $satuan->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="dropdown-item delete-btn" data-satuan-id="{{ $satuan->id }}">
                                                        <i class="bx bx-trash me-1"></i> Delete
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
        document.addEventListener('DOMContentLoaded', function () {
            // Sweet Alert for successful addition
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            @endif

            // Sweet Alert for successful deletion
            $('.delete-btn').on('click', function () {
                let satuanId = $(this).data('satuan-id');
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
                        $('#delete-form-' + satuanId).submit();
                    }
                });
            });
        });
    </script>
@endsection
