@extends('base.base-index')
@section('custom-css')
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12 mb-3">
        <div class="card">
            <div class="card-header">
                <span style="font-size: 20px;">Detail Information {{ $user->name }}</span>
            </div>
            <div class="row card-body">
                <div class="col-lg-6 col-12">
                    <span class="text-white" style="font-size: 16px;">Profile User</span><br>
                    <span style="font-size: 14px;">{{ $user->name }}</span><br>
                    <span style="font-size: 14px;">{{ $user->email }}</span><br>
                    <span style="font-size: 14px;">{{ $user->phone }}</span><br>
                    <span style="font-size: 14px;">{{ $user->code }}</span><br>
                </div>
                <div class="col-lg-6 col-12">
                    <span class="text-white" style="font-size: 16px;">Location User {{ $ip }}</span><br>
                    <span style="font-size: 14px;">{{ $locate->countryName . (' - '). $locate->countryCode }}</span><br>
                    <span style="font-size: 14px;">{{ $locate->regionName . (' - '). $locate->regionCode }}</span><br>
                    <span style="font-size: 14px;">{{ $locate->cityName . (' - '). $locate->zipCode }}</span><br>
                    <span style="font-size: 14px;">{{ $locate->latitude . (' - '). $locate->longitude }}</span><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
@endsection
