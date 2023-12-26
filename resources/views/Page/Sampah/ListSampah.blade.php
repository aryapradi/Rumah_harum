<!-- resources/views/layouts/main.blade.php -->

@extends('layouts.main')

@section('title')
    <title>List Sampah</title>
@endsection

@section('content')


    <div class="mt-5 container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Table Sampah</h5>
                <a href="{{ route('sampah.create') }}" class="btn btn-primary">Tambah Sampah</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga Nasabah</th>
                            <th>Harga Unit</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Satuan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                         ?>
                        @foreach ($sampahs as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>
                                    @if ($row['gambar'])
                                    <a href="{{ asset($row['gambar']) }}" data-lightbox="image-1" data-title="Image">
                                        <img src="{{ asset($row['gambar']) }}" style="width: 100px">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jenisSampah->jenis }}</td>
                                <td>Rp.{{ $row->harga_nasabah }}</td>
                                <td>Rp.{{ $row->harga_unit }}</td>
                                <td>{{ $row->keterangan }}</td>
                                <td>{{ $row->status->nama }}</td>
                                <td>{{ $row->satuan->nama }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item btn-info show-btn" href="{{ route('sampah.show', $row->id) }}">
                                                    <i class="bx bx-search-alt me-1"></i> Show
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item btn-warning show-btn" href="{{ route('sampah.edit', $row->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('sampah.destroy', $row->id) }}" method="post" id="delete-form-{{ $row->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="dropdown-item btn-danger delete-btn" data-sampah-id="{{ $row->id }}">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Make sure jQuery is included -->

<script>
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
            let sampahId = $(this).data('sampah-id'); // Correct variable name
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
                    $('#delete-form-' + sampahId).submit();
                }
            });
        });
    });
</script>
 

    
@endsection
