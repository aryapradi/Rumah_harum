<!-- resources/views/Page/StatusSampah/ListStatusSampah.blade.php -->

@extends('layouts.main')

@section('title')
    <title>List Status Sampah</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Table Status Sampah</h5>
                <a href="{{ route('status.create') }}" class="btn btn-primary">Tambah Status Sampah</a>
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
                    <tbody>
                        @forelse($statusSampahs as $key => $statusSampah)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $statusSampah->nama }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('status.edit', $statusSampah->id) }}"><i class="bx bx-edit-alt me-1"></i>Edit</a></li>
                                            <li>
                                                <form action="{{ route('status.destroy', $statusSampah->id) }}" method="post" id="delete-form-{{ $statusSampah->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="dropdown-item delete-btn" data-status-id="{{ $statusSampah->id }}">
                                                        <i class="bx bx-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            @endif


            // Sweet Alert for successful deletion
            $('.delete-btn').on('click', function () {
                let statusId = $(this).data('status-id');
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
                        $('#delete-form-' + statusId).submit();
                    }
                });
            });
        });
    </script>
@endsection
