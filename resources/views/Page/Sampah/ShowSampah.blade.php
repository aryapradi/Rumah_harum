<!-- resources/views/sampah/show.blade.php -->

@extends('layouts.main')

@section('title')
    <title>Show Sampah</title>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Detail Sampah</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">ID Sampah</th>
                            <td class="text-center">:</td>
                            <td>{{ $sampah->id }}</td>
                        </tr>
                        <tr>
                                <th scope="row">Gambar</th>
                                <td class="text-center">:</td>
                                <td>
                                    @if ($sampah['gambar'])
                                        <a href="{{ asset($sampah['gambar']) }}" data-lightbox="image-1" data-title="Image">
                                            <img src="{{ asset($sampah['gambar']) }}" style="width: 100px">
                                        </a>
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                            </tr>
                        <tr>
                            <th scope="row">Nama</th>
                            <td class="text-center">:</td>
                            <td>{{ $sampah->nama }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis</th>
                            <td class="text-center">:</td>
                            <td>{{ $sampah->jenisSampah->jenis }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Harga Nasabah</th>
                            <td class="text-center">:</td>
                            <td>Rp.{{ $sampah->harga_nasabah }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Harga Unit</th>
                            <td class="text-center">:</td>
                            <td>Rp.{{ $sampah->harga_unit }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Keterangan</th>
                            <td class="text-center">:</td>
                            <td>{{ $sampah->keterangan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td class="text-center">:</td>
                            <td>{{ $sampah->status->nama }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Satuan</th>
                            <td class="text-center">:</td>
                            <td>{{ $sampah->satuan->nama }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3" style="margin-left:20px; margin-bottom: 20px">
                <a href="{{ route('Sampah') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
