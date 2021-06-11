<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Jalan;
use App\Models\Perbaikan;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    public function index()
    {
        $pemeliharaan = Perbaikan::where('status', 0)->get();
        return view('pegawai.pemeliharaan.index', compact('pemeliharaan'));
    }

    public function show($id)
    {
        $jalan = Jalan::find($id);
        return view('pegawai.admin.show', compact('jalan'));
    }

    public function edit($id)
    {
        $perbaikan = Perbaikan::find($id)->first();
        return view('pegawai.pemeliharaan.edit', compact('perbaikan'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'laporan' => 'required',
            'dokumentasi' => 'required'
        ]);

        $perbaikan = Perbaikan::where('id', $id)->first();
        $jalan = Perbaikan::where('id', $perbaikan->jalan_id)->first();
        $perbaikan->update([
            'status' => 1
        ]);

        $jalan->update([
            'status' => 1
        ]);
        
        $image = $request->dokumentasi ? $request->file('dokumentasi')->store('', 'public') :
            'noimage.png';
        History::create([
            'jalan_id' => $perbaikan->jalan_id,
            'laporan' => $request->laporan,
            'dokumentasi' => $image,
        ]);

        notify()->success("Berhasil Dikonfirmasi", "Success", "topRight");
        return redirect()->route('pemeliharaan.index');
    }
}
