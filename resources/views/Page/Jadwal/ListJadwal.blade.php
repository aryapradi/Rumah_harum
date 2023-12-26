<!-- resources/views/Page/Jadwal/ListJadwal.blade.php -->

@extends('Layouts.main')

@section('title')
    <title>List Hari</title>
@endsection

@section('content')

<div class="mt-5 container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Table Hari</h5>
            <a href="{{ route('jadwals.create') }}" class="btn btn-primary">Tambah Hari</a>
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
                    @foreach($jadwals as $key => $jadwal)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $jadwal->nama }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('jadwals.edit', $jadwal->id) }}"><i class="bx bx-edit-alt me-1"></i>Edit</a></li>
                                        <li>
                                            <form action="{{ route('jadwals.destroy', $jadwal->id) }}" method="post" id="delete-form-{{ $jadwal->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="dropdown-item delete-btn" data-jadwal-id="{{ $jadwal->id }}">
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
            let jadwalId = $(this).data('jadwal-id');
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
                    $('#delete-form-' + jadwalId).submit();
                }
            });
        });
    });
</script>

@endsection
