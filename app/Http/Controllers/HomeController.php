<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jalan = Jalan::where('selesai', 0)->get();
        $data['laporan'] = Jalan::whereMonth('created_at', Carbon::now()->month)->get();
        $data['selesai'] = Jalan::whereMonth('created_at', Carbon::now()->month)->where('selesai', 1)->get();
        $data['total'] = Jalan::whereYear('created_at', Carbon::now()->year)->get();
        $data['user'] = User::all();
        return view('pegawai.home', compact('jalan', 'data'));
    }
}
