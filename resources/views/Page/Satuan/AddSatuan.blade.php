<!-- resources/views/Page/Satuan/CreateSatuan.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Form Satuan</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Satuan</h5>
            </div>
            <div class="card-body">
                <!-- Your Satuan add form goes here -->
                <form action="{{ route('satuan.store') }}" method="post">
                    @csrf
                    <!-- Add your form fields here -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="nama" name="nama" required placeholder="Satuan">
                    </div>
                    <!-- Add other form fields as needed -->

                    <button type="submit" class="btn btn-primary">Tambah Satuan</button>
                    <a href="{{ route('Satuan') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
