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
                                <h4 class="card-title">Data jalan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <table class="table table-borderless">
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
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <iframe src="{{ asset("storage/". $jalan->gambar) }}" frameborder="0" width="660"
                                        height="480" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-4">
                                    <div id="mapid" style="width: 100%; height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@push('script')
@include('components.detail-jalan')
@endpush