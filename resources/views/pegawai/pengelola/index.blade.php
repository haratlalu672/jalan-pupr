@extends('layouts._template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard v2</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Jalan</h4>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Laporan</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Alamat</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no =1;
                                        @endphp
                                        @foreach ($jalan as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ 'JL-' . str_pad($data->id, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $data->judul }}</td>
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
                                            <td>{{ $data->lokasi }}</td>
                                            <td>
                                                <img style="width: 80px; height: 100px;"
                                                    src="{{ asset("storage/" . $data->gambar) }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('data.show', $data->slug) }}"
                                                    class="btn btn-info">Detail</a>
                                                <a href="{{ route('pengelolaan.edit', $data->slug) }}"
                                                    class="btn btn-warning">Status</a>
                                                <a href="{{ route('cetakJalanDetail', $data->slug) }}"
                                                    class="btn btn-success">Cetak</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- ./card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
            <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection