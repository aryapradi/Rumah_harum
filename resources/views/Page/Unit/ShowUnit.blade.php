<!-- resources/views/Page/Unit/ShowUnit.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Detail Unit</title>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Detail Unit</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        @if ($unit)
                            <tr>
                                <th scope="row">ID Unit</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Unit</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->nama_unit }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Gambar</th>
                                <td class="text-center">:</td>
                                <td>
                                    @if ($unit['gambar'])
                                        <a href="{{ asset($unit['gambar']) }}" data-lightbox="image-1" data-title="Image">
                                            <img src="{{ asset($unit['gambar']) }}" style="width: 100px">
                                        </a>
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->tanggal }}</td>
                            </tr>
                            <tr>
                                <th scope="row">SK UNIT</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->sk_unit }}</td>
                            </tr>
                            <tr>
                                <th scope="row">SK TERBIT</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->sk_terbit }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->nomor_sk }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Hari Pengangkutan</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->jadwal->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor Handphone</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->nomor_handphone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor Telepon</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->nomor_telepon }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Provinsi</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->province->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kabupaten</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->regency->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kecamatan</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->district->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kelurahan</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->village->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kode Pos</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->kodepos }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat Unit</th>
                                <td class="text-center">:</td>
                                <td>{{ $unit->alamat_lengkap }}</td>
                            </tr>
                            <!-- Tambahkan properti lainnya sesuai kebutuhan -->
                        @else
                            <tr>
                                <td colspan="3">Unit tidak ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-3" style="margin-left:20px; margin-bottom: 20px">
                <a href="{{ route('Unit') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>
@endsection
