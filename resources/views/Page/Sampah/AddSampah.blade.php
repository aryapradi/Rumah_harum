<!-- resources/views/Page/Sampah/CreateSampah.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Form Sampah</title>
@endsection

@section('content')
    <div class="mt-5 container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Sampah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('sampah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Sampah</label>
                        <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan Nama">
                    </div>

                    <div class="mb-3">
                        <img id="gambar-preview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        <label for="gambar" class="form-label">Pilih Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required onchange="previewImage()">
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

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Sampah</label>
                        <select class="form-control" id="jenis" name="jenis_sampah_id">
                            <option value="" disabled selected>-- Pilih Jenis --</option>
                            @foreach($jenisSampahs as $jenisSampah)
                                <option value="{{ $jenisSampah->id }}">{{ $jenisSampah->jenis }}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="mb-3">
                        <label for="harga_nasabah" class="form-label">Harga Nasabah</label>
                        <input type="text" class="form-control" id="harga_nasabah" name="harga_nasabah" required placeholder="Contoh : 10000">
                    </div>
                    <div class="mb-3">
                        <label for="harga_unit" class="form-label">Harga Unit</label>
                        <input type="text" class="form-control" id="harga_unit" name="harga_unit" required placeholder="Contoh : 10000">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status_id">
                            <option value="" disabled selected>-- Pilih Status --</option>
                            @foreach($statusSampahs as $statusSampah)
                                <option value="{{ $statusSampah->id }}">{{ $statusSampah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select class="form-control" id="satuan" name="satuan_id">
                            <option value="" disabled selected>-- Pilih Satuan --</option>
                            @foreach($satuans as $satuan)
                                <option value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Sampah</button>
                    <a href="{{ route('Sampah') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
