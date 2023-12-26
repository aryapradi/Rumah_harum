<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::all();
        return view('Page.Satuan.ListSatuan', compact('satuans'));
    }

    public function create()
    {
        return view('Page.Satuan.AddSatuan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Satuan::create([
            'nama' => $request->input('nama'),
        ]);

        return redirect()->route('Satuan')->with('success', 'Satuan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('Page.Satuan.EditSatuan', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->update([
            'nama' => $request->input('nama'),
        ]);

        return redirect()->route('Satuan')->with('success', 'Satuan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->route('Satuan')->with('success', 'Satuan berhasil dihapus');
    }
}
