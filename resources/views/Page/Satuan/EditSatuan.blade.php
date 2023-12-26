@extends('layouts.main')

@section('title')
    <title>Edit Satuan</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Satuan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('satuan.update', $satuan->id) }}" method="post">
                    @csrf
                    @method('put')
                    
                    <!-- Add your form fields here, for example: -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $satuan->nama }}" required>
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-primary">Update Satuan</button>
                    <a href="{{ route('Satuan') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
