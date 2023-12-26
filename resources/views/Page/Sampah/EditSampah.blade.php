<!-- resources/views/Page/Sampah/FormSampah.blade.php -->

@extends('layouts.main')

@section('title')
    <title>{{ isset($sampah) ? 'Edit Sampah' : 'Tambah Sampah' }}</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ isset($sampah) ? 'Edit Sampah' : 'Tambah Sampah' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ isset($sampah) ? route('sampah.update', $sampah->id) : route('sampah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($sampah))
                        @method('PUT') <!-- Use the PUT method for updates -->
                    @endif

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Sampah</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($sampah) ? $sampah->nama : old('nama') }}" required>
                    </div>

                    <!-- Image upload section -->
                    <div class="mb-3">
                        @if(isset($sampah))
                            <img id="gambar-preview" src="{{ asset($sampah->gambar) }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
                        @else
                            <img id="gambar-preview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        @endif
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" onchange="previewImage()" style="margin-top:20px">
                    </div>

                    <script>
                        function previewImage() {
                            var input = document.getElementById('gambar');
                            var preview = document.getElementById('gambar-preview');

                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    preview.src = e.target.result;
                                    preview.style.display = 'block';
                                }

                                reader.readAsDataURL(input.files[0]);
                            } else {
                                preview.style.display = 'none';
                            }
                        }
                    </script>
                    <!-- End of image upload section -->

                    <!-- Remaining form fields -->
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Sampah</label>
                        <select class="form-control" id="jenis" name="jenis_sampah_id">
                            <option value="" disabled selected>-- Pilih Jenis --</option>
                            @foreach($jenisSampahs as $jenisSampah)
                                <option value="{{ $jenisSampah->id }}" {{ (isset($sampah) && $sampah->jenis_sampah_id == $jenisSampah->id) ? 'selected' : '' }}>
                                    {{ $jenisSampah->jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga_nasabah" class="form-label">Harga Nasabah</label>
                        <input type="text" class="form-control" id="harga_nasabah" name="harga_nasabah" value="{{ isset($sampah) ? $sampah->harga_nasabah : old('harga_nasabah') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga_unit" class="form-label">Harga Unit</label>
                        <input type="text" class="form-control" id="harga_unit" name="harga_unit" value="{{ isset($sampah) ? $sampah->harga_unit : old('harga_unit') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ isset($sampah) ? $sampah->keterangan : old('keterangan') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status_id">
                            <option value="" disabled selected>-- Pilih Status --</option>
                            @foreach($statusSampahs as $statusSampah)
                                <option value="{{ $statusSampah->id }}" {{ (isset($sampah) && $sampah->status_id == $statusSampah->id) ? 'selected' : '' }}>
                                    {{ $statusSampah->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select class="form-control" id="satuan" name="satuan_id">
                            <option value="" disabled selected>-- Pilih Satuan --</option>
                            @foreach($satuans as $satuan)
                                <option value="{{ $satuan->id }}" {{ (isset($sampah) && $sampah->satuan_id == $satuan->id) ? 'selected' : '' }}>
                                    {{ $satuan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ isset($sampah) ? 'Update' : 'Tambah' }} Sampah</button>
                    <a href="{{ route('Sampah') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
