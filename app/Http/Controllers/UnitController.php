<?php

// app/Http/Controllers/UnitController.php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;

use App\Models\Province;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        $provinsis = Province::all(); // Mengambil semua data provinsi
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        return view('Page.Unit.ListUnit', compact('units','provinsis','regencies','districts','villages'));
    }

    public function create()
{
    $pengajuans = Pengajuan::all(); // Use 'all' to get all schedules
    $provinsis = Province::pluck('name', 'id');
    $kabupatens = []; // Inisialisasi data kabupaten sebagai array kosong
    $kecamatans = []; // Inisialisasi data kecamatan  sebagai array kosong
    $desas = []; // Inisialisasi data desa sebagai array kosong

    return view('Page.Unit.AddUnit', compact('pengajuans', 'provinsis', 'kabupatens', 'kecamatans', 'desas'));
}



public function store(Request $request)
{
    
    $request->validate([
        'nama_unit' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // sesuaikan jenis file dan batas ukuran
        'tanggal' => 'required',
        'sk_unit' => 'required',
        'sk_terbit' => 'required',
        'nomor_sk' => 'required',
        'id_pengajuan' => 'required',
        'nomor_handphone' => 'required',
        'nomor_telepon' => 'required',
        'provinsi' => 'required',
        'kabupaten' => 'required',
        'kecamatan' => 'required',
        'kelurahan' => 'required',
        'kodepos' => 'required',
        'alamat_lengkap' => 'required',
    ]);

    // Menyimpan gambar ke direktori storage
    $gambarPath = $this->uploadImage($request->file('gambar'));

    // Menyimpan data unit ke database
    Unit::create([
        'nama_unit' => $request->nama_unit,
        'gambar' => $gambarPath,
        'tanggal' => $request->tanggal,
        'sk_unit' => $request->sk_unit,
        'sk_terbit' => $request->sk_terbit,
        'nomor_sk' => $request->nomor_sk,
        'id_pengajuan' => $request->id_pengajuan,
        'nomor_handphone' => $request->nomor_handphone,
        'nomor_telepon' => $request->nomor_telepon,
        'provinsi' => $request->provinsi,
        'kabupaten' => $request->kabupaten,
        'kecamatan' => $request->kecamatan,
        'kelurahan' => $request->kelurahan,
        'kodepos' => $request->kodepos,
        'alamat_lengkap' => $request->alamat_lengkap,
    ]);

    // Redirect ke halaman yang sesuai dan sertakan pesan sukses
    return redirect()->route('Unit')->with('success', 'Unit berhasil ditambahkan.');
}


private function uploadImage($image)
    {
        $gambarPath = $image->store('public/gambar');
        return str_replace('public/', 'storage/', $gambarPath);
    }



    public function getLocations(Request $request)
    {
        $selectedProvinceId = $request->input('provinsi');
        $selectedRegencyId = $request->input('kabupaten');
        $selectedDistrictId = $request->input('kecamatan');

        $regencies = [];
        $districts = [];
        $villages = [];

        if ($selectedProvinceId) {
            $regencies = Regency::where('province_id', $selectedProvinceId)->get();
        }

        if ($selectedRegencyId) {
            $districts = District::where('regency_id', $selectedRegencyId)->get();
        }

        if ($selectedDistrictId) {
            $villages = Village::where('district_id', $selectedDistrictId)->get();
        }

        return response()->json([
            'regencies' => $regencies,
            'districts' => $districts,
            'villages' => $villages
        ]);
    }

    public function show($id)
    {
        $unit = Unit::find($id);

        return view('Page.Unit.ShowUnit', compact('unit'));
    }

    public function edit(Unit $unit)
{
    $pengajuans = Pengajuan::all(); // Use 'all' to get all schedules
    $provinsis = Province::pluck('name', 'id');
    $kabupatens = []; // Inisialisasi data kabupaten sebagai array kosong
    $kecamatans = []; // Inisialisasi data kecamatan  sebagai array kosong
    $desas = []; // Inisialisasi data desa sebagai array kosong
    return view('Page.Unit.EditUnit', compact('unit', 'pengajuans', 'provinsis','kabupatens','kecamatans','desas'));
}



    public function update(Request $request, Unit $unit)
{
    $request->validate([
        'nama_unit' => 'required',
        'gambar' => 'required',
        'tanggal' => 'required', 
        'sk_unit' => 'required',
        'sk_terbit' => 'required',
        'nomor_sk' => 'required',
        'id_pengajuan' => 'required', 
        'nomor_handphone' => 'required',
        'nomor_telepon' => 'required',
        'id_province' => 'required', 
        'id_regency' => 'required', 
        'id_district' => 'required', 
        'id_village' => 'required', 
        'kodepos' => 'required',
        'alamat_lengkap' => 'required',
        
    ]);

    $unit->update($request->all());

    return redirect()->route('unit.index')->with('success', 'Unit berhasil diperbarui.');
}


    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('Unit')->with('success', 'Unit berhasil dihapus.');
    }
}
