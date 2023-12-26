<!-- resources/views/Page/Jadwal/EditJadwal.blade.php -->

@extends('Layouts.main')

@section('title')
    <title>Edit Hari</title>
@endsection

@section('content')

<div class="mt-5 container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Hari</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwals.update', $jadwal->id) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Hari</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $jadwal->nama }}" required>
                </div>

                <!-- Add other fields as needed -->

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('Jadwal') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection
