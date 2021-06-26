@extends('cetak._partial')
@section('table')

<h5 class="text-center"><u><strong>LAPORAN DETAIL JALAN</strong></u></h5>
{{-- <h6 class="text-center">{{ Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</h6> --}}


<table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="2">
                <img src="{{ asset("storage/". $jalan->gambar) }}" style="width: 100%; height: 400px;">
            </td>
        </tr>
        <tr>
            <td>Kode Jalan</td>
            <td>: {{ 'JL-' . str_pad($jalan->id, 6, '0', STR_PAD_LEFT) }}</td>
        </tr>
        <tr>
            <td>Nama jalan</td>
            <td>: {{ $jalan->judul }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $jalan->lokasi }}</td>
        </tr>
        <tr>
            <td>Panjang</td>
            <td>: {{ $jalan->panjang }} Meter</td>
        </tr>
        <tr>
            <td>Kedalaman</td>
            <td>: {{ $jalan->kedalaman }} cm</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:
                @switch($jalan->status)
                @case(1)
                Baru
                @break
                @case(2)
                Ringan
                @break
                @default
                Berat
                @endswitch
            </td>
        </tr>
    </tbody>
</table>
@endsection

@section('ttd')
<h5 class="mt-5 mr-5" style="text-align: right;">Pengelola</h5>
<h5 class="mr-5 mr-5" style="text-align: right;">{{ auth()->user()->name }}</h5>
@endsection