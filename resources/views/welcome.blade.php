@extends('layouts.app')

@section('content')
    <div id="mapid" style="width: 100%; height: 611px;"></div>
@endsection

@push('script')
<x-map />
@include('components.jalan')
@endpush