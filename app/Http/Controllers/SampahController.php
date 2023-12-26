<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\Satuan;
use App\Models\Status;
use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SampahController extends Controller
{
    public function index()
    {
        $sampahs = Sampah::with(['jenisSampah', 'status', 'satuan'])->get();
        return view('Page.Sampah.ListSampah', compact('sampahs'));
    }

    public function create()
    {
        $jenisSampahs = JenisSampah::all();
        $statusSampahs = Status::all();
        $satuans = Satuan::all();

        return view('Page.Sampah.AddSampah', compact('jenisSampahs', 'statusSampahs', 'satuans'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'jenis_sampah_id' => 'required',
        'harga_nasabah' => 'required',
        'harga_unit' => 'required',
        'status_id' => 'required',
        'satuan_id' => 'required',
        'keterangan' => 'required',
    ]);

    // Membersihkan dan mengonversi nilai harga
    $hargaNasabah = (int)str_replace(['Rp.', ',', '.'], '', $request->input('harga_nasabah'));
    $hargaUnit = (int)str_replace(['Rp.', ',', '.'], '', $request->input('harga_unit'));

    // Membuat dan menyimpan Sampah
    Sampah::create([
        'nama' => $request->input('nama'),
        'gambar' => $this->uploadImage($request->file('gambar')),
        'jenis_sampah_id' => $request->input('jenis_sampah_id'),
        'harga_nasabah' => $hargaNasabah,
        'harga_unit' => $hargaUnit,
        'status_id' => $request->input('status_id'),
        'satuan_id' => $request->input('satuan_id'),
        'keterangan' => $request->input('keterangan'),
    ]);

    return redirect()->route('Sampah')->with('success', 'Sampah berhasil ditambahkan');
}


private function uploadImage($image)
{
    $gambarPath = $image->store('public/gambar');
    return str_replace('public/', 'storage/', $gambarPath);
}

    public function edit($id)
    {
        $sampah = Sampah::findOrFail($id);
        $jenisSampahs = JenisSampah::all();
        $statusSampahs = Status::all();
        $satuans = Satuan::all();

        return view('Page.Sampah.EditSampah', compact('sampah', 'jenisSampahs', 'statusSampahs', 'satuans'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'jenis_sampah_id' => 'required',
        'harga_nasabah' => 'required',
        'harga_unit' => 'required',
        'status_id' => 'required',
        'satuan_id' => 'required',
        'keterangan' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Updated validation for image
    ]);

    $sampah = Sampah::findOrFail($id);

    // Update other fields
    $sampah->update([
        'nama' => $request->input('nama'),
        'jenis_sampah_id' => $request->input('jenis_sampah_id'),
        'harga_nasabah' => $request->input('harga_nasabah'),
        'harga_unit' => $request->input('harga_unit'),
        'status_id' => $request->input('status_id'),
        'satuan_id' => $request->input('satuan_id'),
        'keterangan' => $request->input('keterangan'),
    ]);

    // Update image if a new one is provided
    if ($request->hasFile('gambar')) {
        // Delete the old image (optional, depending on your requirements)
        Storage::delete($sampah->gambar);

        // Upload and update the new image
        $gambarPath = $this->uploadImage($request->file('gambar'));
        $sampah->update(['gambar' => $gambarPath]);
    }

    return redirect()->route('Sampah')->with('success', 'Sampah successfully updated.');
}


    public function show($id)
    {
        $sampah = Sampah::find($id);

        return view('Page.Sampah.ShowSampah', compact('sampah'));
    }

    public function destroy($id)
    {
        $sampahs = Sampah::findOrFail($id);
        $sampahs->delete();

        return redirect()->route('Sampah')->with('success', 'Sampah successfully deleted.');
    }
}
