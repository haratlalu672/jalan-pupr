<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\Prioritas;
use App\Models\User;
use Illuminate\Http\Request;

class PrioritasController extends Controller
{
    public function index()
    {
        $jalan = Jalan::query()->get();
        return view('pegawai.pengelola.index', compact('jalan'));
    }

    public function edit($slug)
    {
        $jalan = Jalan::where('slug', $slug)->first();
        return view('pegawai.pengelola.edit', compact('jalan'));
    }

    public function update(Request $request, $slug)
    {
        Jalan::where('slug', $slug)->first()
            ->update([
                'status' => $request->status
            ]);

        notify()->success("Status Berhasil Diubah", "Success", "topRight");
        return redirect()->route('pengelolaan.index');
    }
}
