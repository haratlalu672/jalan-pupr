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
                                <h4 class="card-title">Data Transaksi</h4>
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#filterModal">
                                    <i class="fa fa-print"></i>
                                    Cetak
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no =1;
                                        @endphp
                                        @foreach ($history as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ 'JL-' . str_pad($data->jalan->id, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td> {{ $data->jalan->lokasi }} </td>
                                            <td>{{ $data->laporan }}</td>
                                            <td>
                                                <img style="width: 80px; height: 100px;"
                                                    src="{{ asset("storage/" . $data->dokumentasi) }}">
                                            </td>
                                            <td>{{ Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('cetakSelesaiDetail', $data->id) }}"
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
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cetakSelesai') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"><label for="date">Tanggal</label></div>
                            <div class="col-md-5">
                                <input type="date" class="form-control" id="date1" name="date1">
                                <span class="text-danger">{{ $errors->first('date1') }}</span>
                            </div>
                            <div class="col-md-5">
                                <input type="date" class="form-control" id="date2" name="date2"
                                    value="{{ date('Y-m-d') }}">
                                <span class="text-danger">{{ $errors->first('date2') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection