@extends('cetak._partial')
@section('table')

<h5 class="text-center"><u><strong>LAPORAN JALAN SELESAI</strong></u></h5>
<h6 class="text-center mb-5">Tanggal :
    {{ Carbon\Carbon::parse($date1)->translatedFormat('d F Y') . ' - ' . Carbon\Carbon::parse($date2)->translatedFormat('d F Y')}}
</h6>

<div class="card-body">
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Jalan</th>
                <th>Alamat</th>
                <th>Laporan</th>
                <th>Dokumentasi</th>
                <th>Tanggal</th>
                {{-- <th>Total</th> --}}
            </tr>
        </thead>
        <tbody>
            @php
            $no =1;
            $total=0;
            @endphp
            @forelse ($filter as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ 'TR-' . str_pad($data->jalan->id, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $data->jalan->lokasi }}</td>
                <td>{{ $data->laporan }}</td>
                <td><img style="width: 80px; height: 100px;" src="{{ asset("storage/" . $data->dokumentasi) }}"></td>
                <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @endsection

    @section('ttd')
    <h5 class="mt-5 mr-5" style="text-align: right;">KUPTD</h5>
    <h5 class="" style="text-align: right;">{{ auth()->user()->name }}</h5>
    @endsection