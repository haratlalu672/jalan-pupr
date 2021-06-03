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
        return view('pegawai.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JalanRequest $request)
    {
        $image = $request->gambar ? $request->file('gambar')->store('images/data') : 'default.jpg';
        Jalan::create($request->validated() + [
            'slug' => Str::slug($request->judul),
            'gambar' => $image
        ]);

        return redirect()->route('data.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function show(Jalan $jalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jalan $jalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jalan $jalan)
    {
        //
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

        // notify()->success("Data Berhasil Dihapus", "Success", "topRight");
        return redirect()->route('data.index');
    }
}
