@extends('layouts._template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Berita Acara</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('perbaikan.index') }}">Perbaikan Jalan</a>
                            </li>
                            <li class="breadcrumb-item active">Berita Acara</li>
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
                                <div class="col-md-12">
                                    <form action="{{ route('perbaikan.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="jalan">Jalan</label>
                                            <select type="text" name="jalan" id="jalan" class="form-control">
                                                @foreach ($jalan as $data)
                                                <option value="{{ $data->id }}">
                                                    {{ 'JL-' . str_pad($data->id, 6, '0', STR_PAD_LEFT) }} -
                                                    {{ $data->judul }}</option>
                                                @endforeach
                                            </select>
                                            @error('consoles')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @include('pegawai.perbaikan._partial')
                                        <br>
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
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@push('script')
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush