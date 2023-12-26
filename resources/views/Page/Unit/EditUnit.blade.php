<!-- resources/views/Page/Unit/EditUnit.blade.php -->

@extends('layouts.main')

@section('title')
    <title>{{ isset($unit) ? 'Edit Unit' : 'Tambah Unit' }}</title>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>{{ isset($unit) ? 'Edit Unit' : 'Tambah Unit' }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ isset($unit) ? route('unit.update', $unit->id) : route('unit.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($unit))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <img id="gambar-preview" src="{{ isset($unit) ? asset($unit->gambar) : '#' }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
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

                    <div class="mb-3">
                        <label for="nama_unit" class="form-label">Nama Unit</label>
                        <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="{{ isset($unit) ? $unit->nama_unit : old('nama_unit') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Berdiri</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ isset($unit) ? $unit->tanggal : old('tanggal') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="sk_unit" class="form-label">SK UNIT</label>
                        <input type="text" class="form-control" id="sk_unit" name="sk_unit" value="{{ isset($unit) ? $unit->sk_unit : old('sk_unit') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="sk_terbit" class="form-label">SK Terbit</label>
                        <input type="text" class="form-control" id="sk_terbit" name="sk_terbit" value="{{ isset($unit) ? $unit->sk_terbit : old('sk_terbit') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomor_sk" class="form-label">Nomor SK</label>
                        <input type="text" class="form-control" id="nomor_sk" name="nomor_sk" value="{{ isset($unit) ? $unit->nomor_sk : old('nomor_sk') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_jadwal" class="form-label">Jadwal Pengangkutan</label>
                        <select class="form-control" id="id_jadwal" name="id_jadwal">
                            <option value="" disabled selected>-- Pilih Hari--</option>
                            @foreach($jadwals as $jadwalss)
                                <option value="{{ $jadwalss->id }}" {{ (isset($unit) && $unit->id_jadwal == $jadwalss->id) ? 'selected' : '' }}>
                                    {{ $jadwalss->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nomor_handphone" class="form-label">Nomor Handphone</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" value="{{ isset($unit) ? $unit->nomor_handphone : old('nomor_handphone') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ isset($unit) ? $unit->nomor_telepon : old('nomor_telepon') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ isset($unit) ? $unit->email : old('email') }}" required>
                    </div>

                    <!-- Dropdown untuk Provinsi -->
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" id="provinceDropdown" name="id_province" required>
                            <option value="" disabled selected>-- Pilih Provinsi --</option>
                            @foreach ($provinsis as $provinceId => $provinceName)
                                <option value="{{ $provinceId }}" {{ (isset($unit) && $unit->id_province == $provinceId) ? 'selected' : '' }}>
                                    {{ $provinceName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dropdown untuk Kabupaten -->
                    <div class="form-group mb-3">
                        <label for="">Kabupaten/Kota</label>
                        <select class="form-control" name="id_regency" id="regencyDropdown" required>
                            <option>-- Pilih Kabupaten/Kota --</option>
                            @foreach ($kabupatens as $kabId => $kabName)
                                <option value="{{$kabId}}" {{ (isset($unit) && $unit->id_regency == $kabId) ? 'selected' : '' }}>
                                    {{ $kabName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Kecamatan</label>
                        <select class="form-control" name="id_district" id="districtDropdown" required>
                            <option>-- Pilih Kecamatan --</option>
                            @foreach ($kecamatans as $kecId => $kecName)
                                <option value="{{$kecId}}" {{ (isset($unit) && $unit->id_district == $kecId) ? 'selected' : '' }}>
                                    {{ $kecName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Kelurahan</label>
                        <select class="form-control" name="id_village" id="villageDropdown" required>
                            <option>-- Pilih Kelurahan-- </option>
                            @foreach ($desas as $desId => $desName)
                                <option value="{{$desId}}" {{ (isset($unit) && $unit->id_village == $desId) ? 'selected' : '' }}>
                                    {{ $desName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kodepos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{ isset($unit) ? $unit->kodepos : old('kodepos') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" value="{{ isset($unit) ? $unit->alamat_lengkap : old('alamat_lengkap') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ isset($unit) ? 'Update' : 'Tambah' }} Unit</button>
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
