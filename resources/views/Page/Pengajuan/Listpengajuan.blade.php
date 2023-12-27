<!-- resources/views/Page/Jadwal/ListJadwal.blade.php -->

@extends('Layouts.main')

@section('title')
    <title>List Hari</title>
@endsection

@section('content')

<div class="mt-5 container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Table Pengajuan</h5>
            <a href="{{ route('pengajuans.create') }}" class="btn btn-primary">Tambah Pengajuan</a>
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
                    @foreach($pengajuans as $key => $pengajuan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pengajuan->nama }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('pengajuans.edit', $pengajuan->id) }}"><i class="bx bx-edit-alt me-1"></i>Edit</a></li>
                                        <li>
                                            <form action="{{ route('pengajuans.destroy', $pengajuan->id) }}" method="post" id="delete-form-{{ $pengajuan->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="dropdown-item delete-btn" data-jadwal-id="{{ $pengajuan->id }}">
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
