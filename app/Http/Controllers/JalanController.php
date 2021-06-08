<?php

namespace App\Http\Controllers;

use App\Http\Requests\JalanRequest;
use App\Models\Jalan;
use Illuminate\Http\Request;
use Str;

class JalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jalan = Jalan::query()->get();
        return view('pegawai.admin.data', compact('jalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.admin.create', [
            'jalan' => new Jalan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JalanRequest $request)
    {
        $image = $request->gambar ? $request->file('gambar')->store('', 'public') : 'noimage.png';
        Jalan::create($request->validated() + [
            'slug' => Str::slug($request->judul),
            'gambar' => $image,
            'status' => '1'
        ]);

        notify()->success("Data Berhasil Ditambah", "Success", "topRight");
        return redirect()->route('data.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $jalan = Jalan::where('slug', $slug)->first();
        return view('pegawai.admin.show', compact('jalan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $jalan = Jalan::where('slug', $slug)->first();
        return view('pegawai.admin.edit', compact('jalan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function update(JalanRequest $request, $slug)
    {
        $jalan = Jalan::where('slug', $slug)->first();
        $image = $request->gambar ? $request->file('gambar')->store('', 'public') : $jalan->gambar;
        if ($request->gambar) {
            if ($jalan->gambar) {
                \Storage::delete('storage/app/public/' . $jalan->gambar);
            }
        }

        $jalan->update($request->validated() + [
            'gambar' => $image
        ]);

        notify()->success("Data Berhasil Diedit", "Success", "topRight");
        return redirect()->route('data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jalan::find($id)->delete();

        notify()->success("Data Berhasil Dihapus", "Success", "topRight");
        return redirect()->route('data.index');
    }
}
