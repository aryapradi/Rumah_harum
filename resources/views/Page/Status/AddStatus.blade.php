<!-- resources/views/Page/StatusSampah/AddStatus.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Form Status Sampah</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Status Sampah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('status.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Status Sampah</label>
                        <input type="text" class="form-control" id="nama" name="nama" required placeholder="Status Sampah">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Status Sampah</button>
                    <a href="{{ route('Status') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
