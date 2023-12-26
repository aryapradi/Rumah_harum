<?php




namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenissampah = JenisSampah::all();
        return view('Page.Jenis.ListJenis', compact('jenissampah'));
    }

    public function create()
    {
        return view('Page.Jenis.AddJenis');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
        ]);

        JenisSampah::create($request->all());

        return redirect()->route('Jenis')->with('success', 'Jenis Sampah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenis = JenisSampah::findOrFail($id);
        return view('Page.Jenis.EditJenis', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
        ]);

        JenisSampah::find($id)->update($request->all());

        return redirect()->route('Jenis')->with('success', 'Jenis Sampah berhasil diperbarui');
    }

    public function destroy($id)
    {
        JenisSampah::find($id)->delete();

        return redirect()->route('Jenis')->with('success', 'Jenis Sampah berhasil dihapus');
    }
}



