@extends('cetak._partial')
@section('table')

<h5 class="text-center"><u><strong>LAPORAN JALAN</strong></u></h5>
<h6 class="text-center">Tanggal :
    {{ Carbon\Carbon::parse($date1)->translatedFormat('d F Y') . ' - ' . Carbon\Carbon::parse($date2)->translatedFormat('d F Y')}}
</h6>
{{-- <h6 class="text-center">Status : {{ ($status == 1 ? 'selesai' : $status == '0') ? 'Belum Selesai' : '-' }}
</h6> --}}
<h6 class="text-center mb-3">
    Tingkat Kerusakan : @switch($kerusakan)
    @case(1)
    Baru
    @break
    @case(2)
    Ringan
    @break
    @case(3)
    Berat
    @break
    @default
    -
    @endswitch
</h6>

<div class="card-body">
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Laporan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Kerusakan</th>
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
                <td>{{ 'JL-' . str_pad($data->id, 6, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->lokasi }}</td>
                <td>{{ $data->selesai == 0 ? 'Belum Selesai' : 'Selesai' }}</td>
                <td>
                    @switch($data->status)
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
                <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}
                </td>
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