@extends('base.base-index')
@section('custom-css')
<link href="{{ asset('main') }}/src/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('main') }}/src/assets/css/dark/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
<style>
    .a-icon{
        font-size: 50px;
    }
    .t-20{
        font-size: 20px
    }
    /* Aturan CSS untuk tampilan desktop */
@media (min-width: 768px) {
    .card .icon {
        margin-right: 20px;
    }
}

/* Aturan CSS untuk tampilan mobile */
@media (max-width: 767px) {
    .card .icon {
        margin-right: 0; /* Menghapus margin kanan pada ikon */
        text-align: left; /* Mengatur teks ikon menjadi rata kiri */
    }
}
</style>
<link href="{{ asset('main') }}/src/plugins/src/apex/apexcharts.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
@if(Str::is('author/home', request()->path()))
@include('base.base-home-author')
@elseif(Str::is('admin/home', request()->path()))
@include('base.base-home-admin')
@endif
<div class="row layout-top-spacing">
    <div class="col-lg-3 col-12 mb-3">

        {{-- DASHBOARD UNTUK ADMIN --}}
    </div>
    <div class="col-lg-12 col-12 mb-3">
        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">Dashboard Information</span>
                <span class="align-items-center">
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i> ReFresh</a>
                </span>
            </div>
            <div class="card-body">
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">CreatedAt</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $announ = App\Models\Announcement::all();
                        @endphp
                        @foreach ($announ as $key => $item)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="text-center">{{ $item->user->name }}</td>
                            <td class="text-center">{{ $item->created_at->diffforhumans() }}</td>
                            <td class="text-center">
                                <a href="{{ route('guest.app.announ.show', $item->id) }}" class="btn btn-outline-secondary btn-rounded"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
    <script>

        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c3);
    </script>
    <script src="{{ asset('main') }}/src/plugins/src/apex/apexcharts.min.js"></script>
    @if (Str::is('admin/home', request()->path()))

    <script>
        var productsData = @json($productsData); // Mengambil data dari Blade

        var sColStacked = {
            chart: {
                fontFamily: 'Nunito, Arial, sans-serif',
                height: 350,
                type: 'bar',
                stacked: true,
                toolbar: {
                    show: false,
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                },
            },
            series: productsData,
            xaxis: {
                categories: @json($dates),
            },
            legend: {
                position: 'right',
                offsetY: 40,
                markers: {
                    width: 10,
                    height: 10,
                    offsetX: -5,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0
                }
            },
            fill: {
                opacity: 1
            }
        };

        var simpleColumnStacked = new ApexCharts(
            document.querySelector("#chartpenjualan"),
            sColStacked
        );

        simpleColumnStacked.render();
    </script>
    @endif

@endsection
