@extends('cetak._partial')
@section('table')

<h5 class="text-center"><u><strong>PEGAWAI DIVISI JALAN</strong></u></h5>
{{-- <h6 class="text-center">{{ Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</h6> --}}


<table id="datatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no =1;
        @endphp
        @foreach ($user as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->username }}</td>
            <td>{{ $data->role->name }}</td>
            <td>
                <img style="width: 80px; height: 100px;"
                    src="{{ asset("storage/" . $data->profil) }}">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('ttd')
<h5 class="mt-5 mr-5" style="text-align: right;">Kepala UPTD</h5>
<h5 class="mr-3" style="text-align: right;">{{ auth()->user()->name }}</h5>
@endsection