@extends('base.base-index')
@section('custom-css')

<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12">
        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">{{ $submenu }}</span>
                <span class="align-items-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#createUser" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-user-plus"></i></a>
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="card-body">
                @if(Str::is('admin/booking/all', request()->path()))
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Record Id</th>
                            <th class="text-center">Package Name</th>
                            <th class="text-center">Client Name</th>
                            <th class="text-center">Booking Date</th>
                            <th class="text-center">Booking Time</th>
                            <th class="text-center">Booking Price</th>
                            <th class="text-center">Booking Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->paket->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                            <td>{{ $item->book_time }}</td>
                            <td>{{ $item->paket->price }}</td>
                            <td><span class="badge badge-danger">{{ $item->book_stat }}</span></td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-warning bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" data-original-title="Show">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.index', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.index', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @elseif(Str::is('admin/booking/pending', request()->path()))
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Record Id</th>
                            <th class="text-center">Package Name</th>
                            <th class="text-center">Client Name</th>
                            <th class="text-center">Booking Date</th>
                            <th class="text-center">Booking Time</th>
                            <th class="text-center">Booking Price</th>
                            <th class="text-center">Booking Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->paket->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                            <td>{{ $item->book_time }}</td>
                            <td>{{ $item->paket->price }}</td>
                            <td><span class="badge badge-danger">{{ $item->book_stat }}</span></td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-warning bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" data-original-title="Show">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.index', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.index', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @elseif(Str::is('admin/booking/progress', request()->path()))
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Record Id</th>
                            <th class="text-center">Package Name</th>
                            <th class="text-center">Client Name</th>
                            <th class="text-center">Booking Date</th>
                            <th class="text-center">Booking Time</th>
                            <th class="text-center">Booking Price</th>
                            <th class="text-center">Booking Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($progress as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->paket->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                            <td>{{ $item->book_time }}</td>
                            <td>{{ $item->paket->price }}</td>
                            <td><span class="badge badge-warning">{{ $item->book_stat }}</span></td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-warning bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" data-original-title="Show">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.index', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.index', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @elseif(Str::is('admin/booking/done', request()->path()))
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Record Id</th>
                            <th class="text-center">Package Name</th>
                            <th class="text-center">Client Name</th>
                            <th class="text-center">Booking Date</th>
                            <th class="text-center">Booking Time</th>
                            <th class="text-center">Booking Price</th>
                            <th class="text-center">Booking Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($done as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->paket->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                            <td>{{ $item->book_time }}</td>
                            <td>{{ $item->paket->price }}</td>
                            <td><span class="badge badge-success">{{ $item->book_stat }}</span></td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-warning bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" data-original-title="Show">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a  href="{{ route('admin.booking.index', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.index', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.index', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
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
        <script>
            function deleteData(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are going to delete this item.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Cancelled',
                            'Deletion cancelled',
                            'error'
                        );
                    }
                });
            }
        </script>
@endsection
