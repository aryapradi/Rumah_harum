<!-- resources/views/Page/Jadwal/CreateJadwal.blade.php -->

@extends('Layouts.main')

@section('title')
    <title>Form Pengajuan</title>
@endsection

@section('content')

<div class="mt-5 container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Tambah Pengajuan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengajuans.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Hari Pengajuan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required placeholder="Hari">
                </div>
                <!-- Tambahkan input lainnya sesuai kebutuhan -->
                <button type="submit" class="btn btn-primary">Simpan</button>

                <!-- Tombol Kembali -->
                <a href="{{ route('Pengajuan') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection
