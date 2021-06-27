<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Jalan;
use App\Models\Perbaikan;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function jalanDetail(Jalan $jalan)
    {
        $pdf = \PDF::loadView('cetak.jalan-detail', compact('jalan'));
        $pdf->setPaper('a4', 'potrait');
        $pdf->setOptions([
            'margin-bottom' => 0,
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->stream('Laporan.pdf');
    }

    public function suratTugas(Perbaikan $perbaikan)
    {
        $pdf = \PDF::loadView('cetak.surat-tugas', compact('perbaikan'));
        $pdf->setPaper('a4', 'potrait');
        $pdf->setOptions([
            'margin-bottom' => 0,
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->stream('Laporan.pdf');
    }
    public function cetakPegawai()
    {
        $user = User::with('role')->get();
        $pdf = \PDF::loadView('cetak.pegawai', compact('user'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'margin-bottom' => 0,
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->stream('Laporan.pdf');
    }
    public function detailPegawai(User $user)
    {
        $pdf = \PDF::loadView('cetak.detail-pegawai', compact('user'));
        $pdf->setPaper('a4', 'potrait');
        $pdf->setOptions([
            'margin-bottom' => 0,
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->stream('Laporan.pdf');
    }
    public function cetakSelesaiDetail(History $history)
    {
        $pdf = \PDF::loadView('cetak.detail-selesai', compact('history'));
        $pdf->setPaper('a4', 'potrait');
        $pdf->setOptions([
            'margin-bottom' => 0,
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->stream('Laporan.pdf');
    }
    public function cetakSelesai(Request $request)
    {
        $this->validate($request, [
            'date1' => 'required',
            'date2' => 'required',
        ], [
            'date1.required' => 'Tanggal harus diisi',
            'date2.required' => 'Tanggal harus diisi'
        ]);
        $query = History::query();
        $date1 = str_replace("-", "", $request->input('date1'));
        $date2 = str_replace("-", "", $request->input('date2'));

        !empty($date1) ? $query->whereBetween(DB::raw('CAST(created_at as date)'), [$date1, $date2]) : null;
        $filter = $query->get();


        $pdf = \PDF::loadView('cetak.jalan-selesai', compact('filter', 'date1', 'date2'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'margin-bottom' => 0,
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->stream('Laporan.pdf');
    }
    public function cetakJalan(Request $request)
    {
        $this->validate($request, [
            'date1' => 'required',
            'date2' => 'required',
        ], [
            'date1.required' => 'Tanggal harus diisi',
            'date2.required' => 'Tanggal harus diisi'
        ]);
        $query = Jalan::query();
        $date1 = str_replace("-", "", $request->input('date1'));
        $date2 = str_replace("-", "", $request->input('date2'));
        $status = $request->input('selesai');
        $kerusakan = $request->input('status');

        !empty($date1) ? $query->whereBetween(DB::raw('CAST(created_at as date)'), [$date1, $date2]) : null;
        !empty($status) ? $query->where('selesai', $status) : null;
        !empty($kerusakan) ? $query->where('status', $kerusakan) : null;
        $filter = $query->get();


        $pdf = \PDF::loadView('cetak.data-jalan', compact('filter', 'date1', 'date2', 'status', 'kerusakan'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->setOptions([
            'margin-bottom' => 0,
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->stream('Laporan.pdf');
    }
}
