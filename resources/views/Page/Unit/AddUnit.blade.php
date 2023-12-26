<!-- resources/views/Page/Unit/AddUnit.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Tambah Unit</title>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Tambah Unit</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('unit.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

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
                        <label for="nama_unit" class="form-label">Nama Unit</label>
                        <input type="text" class="form-control" id="nama_unit" name="nama_unit" required placeholder="Masukkan Nama">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Berdiri</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required placeholder="Masukkan Nama">
                    </div>

                    <div class="mb-3">
                        <label for="sk_unit" class="form-label">SK UNIT</label>
                        <input type="text" class="form-control" id="sk_unit" name="sk_unit" required placeholder="Masukkan SK UNIT">
                    </div>

                    <div class="mb-3">
                        <label for="sk_terbit" class="form-label">SK Terbit</label>
                        <input type="text" class="form-control" id="sk_terbit" name="sk_terbit" required placeholder="Masukkan SK UNIT">
                    </div>

                    <div class="mb-3">
                        <label for="nomor_sk" class="form-label">Nomor SK</label>
                        <input type="text" class="form-control" id="nomor_sk" name="nomor_sk" required placeholder="Masukkan Nomor SK ">
                    </div>

                    <div class="mb-3">
                        <label for="id_jadwal" class="form-label">Jadwal Pengangkutan</label>
                        <!-- Tambahkan dropdown untuk status sampah -->
                        <select class="form-control" id="id_jadwal" name="id_jadwal">
                            <option>-- Pilih Hari--</option>
                            @foreach($jadwals as $jadwalss)
                                <option value="{{ $jadwalss->id }}">{{ $jadwalss->nama }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="nomor_handphone" class="form-label">Nomor Handphone</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" required placeholder="Masukkan nomor handphone">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" required placeholder="Masukkan nomor telepon">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required placeholder="Masukan Email ">
                    </div>

                    <!-- Dropdown untuk Provinsi -->
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" id="provinceDropdown" name="provinsi" required>
                            <option value="" disabled selected>-- Pilih Provinsi --</option>
                            @foreach ($provinsis as $provinceId => $provinceName)
                                <option value="{{ $provinceId }}">{{ $provinceName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dropdown untuk Kabupaten -->
                    <div class="form-group mb-3">
                        <label for="">Kabupaten/Kota</label>
                        <select class="form-control" name="kabupaten" id="regencyDropdown" required  >
                        <option>-- Pilih Kabupaten/Kota --</option>
                        @foreach ($kabupatens as $kabId => $kabName)
                        <option value="{{$kabId}}">{{$kabName}}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="districtDropdown" required  >
                        <option>-- Pilih Kecamatan 
                        @foreach ($kecamatans as $kecId => $kecName)
                        <option value="{{$kecId}}">{{$kecName}}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="villageDropdown" required  >
                        <option>-- Pilih Kelurahan-- </option>
                        @foreach ($desas as $desId => $desName)
                        <option value="{{$desId}}">{{$desName}}</option>
                        @endforeach
                       </select>
                    </div>

                    <div class="mb-3">
                        <label for="kodepos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="kodepos" name="kodepos" required placeholder="Masukan Kodepos">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" required placeholder="Masukan Alamat Lengkap ">
                    </div>



                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('Unit') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#provinceDropdown').change(function () {
                var selectedProvince = $(this).val();
    
                $.ajax({
                    url: '/unit/getLocations',
                    type: 'GET',
                    data: { provinsi: selectedProvince },
                    success: function (data) {
                        // Update dropdown kabupaten
                        var regencyOptions = '<option value="" disabled selected>-- Pilih Kabupaten --</option>';
                        data.regencies.forEach(function (regency) {
                            regencyOptions += '<option value="' + regency.id + '">' + regency.name + '</option>';
                        });
                        $('#regencyDropdown').html(regencyOptions);
    
                        // Reset dropdown kecamatan dan desa
                        $('#districtDropdown').html('<option value="" disabled selected>-- Pilih Kecamatan --</option>');
                        $('#villageDropdown').html('<option value="" disabled selected>-- Pilih Kelurahan/Desa --</option>');
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
            });
    
            $('#regencyDropdown').change(function () {
                var selectedRegency = $(this).val();
    
                $.ajax({
                    url: '/unit/getLocations',
                    type: 'GET',
                    data: { kabupaten: selectedRegency },
                    success: function (data) {
                        // Update dropdown kecamatan
                        var districtOptions = '<option value="" disabled selected>-- Pilih Kecamatan --</option>';
                        data.districts.forEach(function (district) {
                            districtOptions += '<option value="' + district.id + '">' + district.name + '</option>';
                        });
                        $('#districtDropdown').html(districtOptions);
    
                        // Reset dropdown desa
                        $('#villageDropdown').html('<option value="" disabled selected>-- Pilih Kelurahan/Desa --</option>');
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
            });
    
            $('#districtDropdown').change(function () {
                var selectedDistrict = $(this).val();
    
                $.ajax({
                    url: '/unit/getLocations',
                    type: 'GET',
                    data: { kecamatan: selectedDistrict },
                    success: function (data) {
                        // Update dropdown desa
                        var villageOptions = '<option value="" disabled selected>-- Pilih Kelurahan/Desa --</option>';
                        data.villages.forEach(function (village) {
                            villageOptions += '<option value="' + village.id + '">' + village.name + '</option>';
                        });
                        $('#villageDropdown').html(villageOptions);
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
            });
        });
    </script>
    

    

@endsection
