<!-- resources/views/Page/JenisSampah/EditJenis.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Edit Jenis Sampah</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Jenis Sampah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Sampah</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $jenis->jenis }}" required>
                    </div>
                    <!-- Tambahkan kolom formulir lain jika diperlukan -->
                    <button type="submit" class="btn btn-primary">Perbarui Jenis Sampah</button>
                    <a href="{{ route('Jenis') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
