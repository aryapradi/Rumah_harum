<?php

// app/Http/Controllers/StatusSampahController.php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statusSampahs = Status::all();
        return view('Page.Status.ListStatus', compact('statusSampahs'));
    }

    public function create()
    {
        return view('Page.Status.AddStatus'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            // tambahkan validasi lain jika diperlukan
        ]);

        Status::create($request->all());

        return redirect()->route('Status')->with('success', 'Status Sampah successfully added.');
    }

    public function edit($id)
    {
        $statusSampah = Status::findOrFail($id);
        return view('Page.Status.EditStatus', compact('statusSampah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            // tambahkan validasi lain jika diperlukan
        ]);

        Status::findOrFail($id)->update($request->all());

        return redirect()->route('Status')->with('success', 'Status Sampah successfully updated.');
    }

    public function destroy($id)
    {
        Status::findOrFail($id)->delete();

        return redirect()->route('Status')->with('success', 'Status Sampah successfully deleted.');
    }
}
