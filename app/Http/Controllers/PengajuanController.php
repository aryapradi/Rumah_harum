<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('Page.Pengajuan.Listpengajuan', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Page.Pengajuan.Addpengajuan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengajuan::create([
            'nama' => $request->input('nama'),
            
        ]);
    
        return redirect()->route('Pengajuan')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        return view('Page.Pengajuan.Editpengajuan', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama' => 'required|max:255',
            // Sesuaikan dengan field lainnya
        ]);

        // Ambil data jadwal berdasarkan ID
        $pengajuan = Pengajuan::findOrFail($id);

        // Update data jadwal
        $pengajuan->update([
            'nama' => $request->input('nama'),
            // Sesuaikan dengan field lainnya
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('Pengajuan')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('Pengajuan')->with('success', 'Jadwal berhasil dihapus.');
    }
}
