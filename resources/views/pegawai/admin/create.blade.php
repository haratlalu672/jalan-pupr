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
                                <h4 class="card-title">Tambah Jalan</h4>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="mapid" style="width: 100%; height: 598px;"></div>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('data.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="judul">Nama</label>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                placeholder="nama" value="{{ old('judul') }}">
                                            <span class="text-danger">{{ $errors->first('judul') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="longtext" class="form-control" id="lokasi" name="lokasi"
                                                placeholder="Alamat" value="{{ old('lokasi') }}">
                                            <span class="text-danger">{{ $errors->first('lokasi') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="diameter">Diameter</label>
                                            <input type="number" class="form-control" id="diameter" name="diameter"
                                                placeholder="Diameter dalam cm" value="{{ old('diameter') }}">
                                            <span class="text-danger">{{ $errors->first('diameter') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="kedalaman">Kedalaman</label>
                                            <input type="number" class="form-control" id="kedalaman" name="kedalaman"
                                                placeholder="Kedalaman dalam cm" value="{{ old('kedalaman') }}">
                                            <span class="text-danger">{{ $errors->first('kedalaman') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input id="gambar" type="file"
                                                class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                                                @error('gambar') <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude"
                                                placeholder="Latitude Marker" readonly>
                                            <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude"
                                                placeholder="Longitude Marker" readonly>
                                            <span class="text-danger">{{ $errors->first('longitude') }}</span>
                                        </div>
                                        <button type="submit" class="btn btn-primary ml-2">Save </button>
                                    </form>
                                </div>
                            </div>
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

@push('script')
<x-map />
@endpush

@push('draggable')
<script>
    let curLocation=[0,0];
</script>
<x-dragable />
@endpush