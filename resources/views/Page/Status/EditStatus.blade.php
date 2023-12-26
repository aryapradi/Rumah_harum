<!-- resources/views/Page/StatusSampah/EditStatusSampah.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Edit Status Sampah</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Status Sampah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('status.update', $statusSampah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Status Sampah</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $statusSampah->nama }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Status Sampah</button>
                    <a href="{{ route('Status') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
