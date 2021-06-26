<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    @include('cetak._style')
</head>

<body>
    <img class="mb-3" src="{{ asset('Logo Pemko Banjarmasin.jpg') }}"
        style="height: auto; width: 90px; position: absolute;" alt="">
    <table id="kop">
        <tr>
            <td align="center">
                <span style="font-weight: bold;">
                    <h6>PEMERINTAH KOTA BANJARMASIN</h6>
                    <h6>DINAS PEKERJAAN UMUM DAN PERUMAHAN RAKYAT</h6>
                    <h6>UPTD PEMELIHARAAN JALAN</h6>
                </span>
                <p>Jl. Brigjend H. Hasan Basri No.82, Pangeran Telp. (0511) 3300385</p>
            </td>
        </tr>
    </table>
    <hr class="line-title-report">
    @yield('table')
    <h5 class="mt-5" style="text-align: right;">Banjarmasin, {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}<h5>
<br>
@yield('ttd')
</body>

{{-- App\Models\User::with('App\Models\Role')->find($data->id)->get()
$user->role()->find($data->id) --}}