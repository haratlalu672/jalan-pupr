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
                                <h4 class="card-title">Edit</h4>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('pengelolaan.update', $jalan->slug) }}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select type="text" name="status" id="status" class="form-control">
                                                <option value="1">Pilih</option>
                                                <option value="2" {{ $jalan->status == '2' ? 'selected' : '' }}>Ringan
                                                </option>
                                                <option value="3" {{ $jalan->status == '3' ? 'selected' : '' }}>Berat
                                                </option>
                                            </select>
                                            @error('consoles')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary ml-2">Save</button>
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

{{-- @push('script')
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush --}}