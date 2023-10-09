@extends('base.base-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">

<style>
.right{
    margin-right: 10px;
}
.container {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
</style>

@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">{{ $announ->title }}</span>
                <span class="align-items-center">
                    <a href="{{ route('back') }}" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-backward"></i></a>
                </span>
            </div>
            <div class="card-body">
                <span style="font-size: 20;">{{ $announ->desc }}</span>
                @if($announ->attach)
                <div class="container">

                    <!-- Konten card lainnya -->
                    <iframe class="responsive-iframe" src="{{ asset('storage/'.$announ->attach) }}"></iframe>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <span style="font-size: 20;">Release By {{ $announ->user->name }} At {{ $announ->created_at->diffforhumans() }}</span>

            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
@endsection
@section('custom-js')
@endsection
