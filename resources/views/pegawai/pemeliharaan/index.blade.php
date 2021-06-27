@extends('layouts._template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pemeliharaan Jalan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pemeliharaan Jalan</li>
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
                                            <th>Kode Perbaikan</th>
                                            <th>Petugas</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no =1;
                                        @endphp
                                        @foreach ($pemeliharaan as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ 'PB-' . str_pad($data->id, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $data->users()->get()->implode('name',', ') }}</td>
                                            <td>{{ $data->jalan->lokasi }}</td>
                                            <td>
                                                <a href="{{ route('pemeliharaan.show', $data->jalan->id) }}"
                                                    class="btn btn-info">Detail</a>
                                                    @if (auth()->user()->id == $data->users()->get()->implode('id',', '))
                                                    <a href="{{ route('pemeliharaan.edit', $data->id) }}"
                                                        class="btn btn-warning">Konfirmasi</a>  
                                                    @endif
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