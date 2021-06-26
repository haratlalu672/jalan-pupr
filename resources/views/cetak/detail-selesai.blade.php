@extends('cetak._partial')
@section('table')

<h5 class="text-center"><u><strong>LAPORAN JALAN SELESAI</strong></u></h5>
{{-- <h6 class="text-center">{{ Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</h6> --}}


<table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
    <tbody>
        <tr>
            <td>Kode Jalan</td>
            <td>: {{ 'JL-' . str_pad($history->jalan->id, 6, '0', STR_PAD_LEFT) }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td style="word-wrap: break-word">: {{ $history->jalan->lokasi }}</td>
        </tr>
        <tr>
            <td>Laporan</td>
            <td style="word-wrap: break-word">: {{ $history->laporan }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ Carbon\Carbon::parse($history->created_at)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>Sebelum<br><img src="{{ asset("storage/". $history->jalan->gambar) }}"
                    style="width: 50%; height: 300px;"></td>
            <td>Sesudah<br><img src="{{ asset("storage/". $history->dokumentasi) }}" style="width: 50%; height: 300px;">
            </td>
        </tr>
    </tbody>
</table>
@endsection

@section('ttd')
<h5 class="mt-5 mr-5" style="text-align: right;">KUPTD</h5>
<h5 class="" style="text-align: right;">{{ auth()->user()->name }}</h5>
@endsection