<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Jalan;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = History::query()->get();
        return view('pegawai.histori.index', compact('history'));
    }

    public function jalan()
    {
        $jalan = Jalan::query()->get();
        return view('pegawai.histori.data', compact('jalan'));
    }

    
}
