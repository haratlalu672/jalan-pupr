@extends('cetak._partial')
@section('table')

<h5 class="text-center"><u><strong>KARTU NAMA</strong></u></h5>
{{-- <h6 class="text-center">{{ Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</h6> --}}
<div class="text-center mt-2">
    <img src="{{ asset("storage/". $user->profil) ?? asset('img/user.png') }}" style="width: 50%; height: 300px;"
        class="d-block">
</div>

<table class="table table-borderless">
    <tbody>
        <tr>
            <td>Nama</td>
            <td>: {{ strtoupper($user->name) }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: {{ strtoupper($user->role->name) }}</td>
        </tr>
    </tbody>
</table>
@endsection

@section('ttd')
<h5 class="mt-5 mr-5" style="text-align: right;">Kepala UPTD</h5>
<h5 class="mr-3" style="text-align: right;">{{ auth()->user()->name }}</h5>
@endsection