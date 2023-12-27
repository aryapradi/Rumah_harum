<!-- resources/views/units/index.blade.php -->

@extends('layouts.main')

@section('title')
    <title>List Unit</title>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>List Unit</h2>
                    <a href="{{ route('unit.create') }}" class="btn btn-primary">Tambah Unit</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Unit</th>         
                                <th>Tanggal Berdiri</th>
                                <th>Jadwal Pengangkutan</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($units as $unit)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @if ($unit['gambar'])
                                        <a href="{{ asset($unit['gambar']) }}" data-lightbox="image-1" data-title="Image">
                                            <img src="{{ asset($unit['gambar']) }}" style="width: 100px">
                                        </a>
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>{{ $unit->nama_unit }}</td>
                                    <td>{{ $unit->tanggal }}</td>
                                    <td>{{ $unit->pengajuan->nama}}</td>
                                    <td>{{ $unit->district->name }}</td>
                                    <td>{{ $unit->village->name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item btn-info show-btn" href="{{ route('unit.show', $unit->id) }}">
                                                        <i class="bx bx-search-alt me-1"></i> Show
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item btn-warning edit-btn" href="{{ route('unit.edit', $unit->id) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('unit.destroy', $unit->id) }}" method="post" id="delete-form-{{ $unit->id }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item btn-danger delete-btn" data-unit-id="{{ $unit->id }}">
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
                let unitId = $(this).data('unit-id');
                Swal.fire({
                    title: 'Anda Ingin Menghapus?',
                    text: 'Data Tersebut Akan Terhapus',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete-form-' + unitId).submit();
                    }
                });
            });
        });
    </script>
    <!-- ... Your existing script ... -->
@endsection
