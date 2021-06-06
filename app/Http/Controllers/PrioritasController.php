<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use Illuminate\Http\Request;

class PrioritasController extends Controller
{
    public function index()
    {
        $jalan = Jalan::query()->get();
        return view('pegawai.pengelola.index', compact('jalan'));
    }
}
