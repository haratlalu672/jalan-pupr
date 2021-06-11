<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\Perbaikan;
use App\Models\User;
use Illuminate\Http\Request;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perbaikan = Perbaikan::where('status', 0)->get();
        return view('pegawai.perbaikan.index', compact('perbaikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.perbaikan.create', [
            'perbaikan' => new Perbaikan,
            'jalan' => Jalan::where('status', '>', 1)->orderBy('status', 'DESC')->get(),
            'users' => User::where('role_id', 3)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perbaikan = Perbaikan::create([
            'jalan_id' => request('jalan'),
        ]);
        $perbaikan->users()->sync(request('users'));

        notify()->success("Data Berhasil Ditambah", "Success", "topRight");
        return redirect()->route('perbaikan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(Perbaikan $perbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perbaikan $perbaikan)
    {
        $users = User::where('role_id', 3)->get();
        return view('pegawai.perbaikan.edit', compact('perbaikan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perbaikan $perbaikan)
    {
        request()->validate([
            'users' => 'required'
        ]);

        $perbaikan->update();

        $perbaikan->users()->sync(request('users'));

        notify()->success("Data Berhasil Diedit", "Success", "topRight");
        return redirect()->route('perbaikan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perbaikan  $perbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perbaikan $perbaikan)
    {
        //
    }
}
