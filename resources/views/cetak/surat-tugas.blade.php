@extends('cetak._partial')
@section('table')

<h5 class="text-center"><u><strong>SURAT TUGAS</strong></u></h5>
<h6 class="text-center">Nomor : 551.100/{{ $perbaikan->id }}/Dispupr/{{ date('Y') }}</h6>
<p class="mt-5">Bahwa untuk melaksanakan pelayanan Perawatan Jalan Umum dan Perbaikan Jalan Umum di kota Banjarmasin.</p>
<h5 class="text-center"><u><strong>MEMERINTAHKAN</strong></u></h5>
<p>Kepada :</p>
@foreach ($perbaikan->users as $data)
<ol>
    <li>{{ $data->name }}</li>
</ol>
@endforeach
<p>Selaku Petugas / Tim Pemelihara Perawatan Jalan Umum dan Perbaikan Jalan Umum di Kota Banjarmasin dengan uraian
    sebagai berikut </p>

<table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Perbaikan</th>
            <th>Uraian Tugas</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>{{ 'PB-' . str_pad($perbaikan->id, 6, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $perbaikan->jalan->judul }}</td>
            <td>{{ $perbaikan->jalan->lokasi }}</td>
        </tr>
    </tbody>
</table>

<p>Demikian surat ini dibuat agar dilaksanakan sebagaimana mestinya</p>
@endsection

@section('ttd')
<h5 class="mt-5 mr-5" style="text-align: right;">Pengelola</h5>
<h5 class="mr-5 mr-5" style="text-align: right;">{{ auth()->user()->name }}</h5>
@endsection