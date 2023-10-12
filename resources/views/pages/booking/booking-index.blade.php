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
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="card-body">
                @if(Str::is('admin/booking/all', request()->path()))
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama Paket</th>
                            <th class="text-center">Nama Klien</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Jam Pemesanan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Status Pesanan</th>
                            <th class="text-center">Aksi</th>
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
                            <td>{!! $item->book_stat !!}</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.destroy', $item->id) }}" data-name="{{ $item->name }}"
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
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama Paket</th>
                            <th class="text-center">Nama Klien</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Jam Pemesanan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Status Pesanan</th>
                            <th class="text-center">Aksi</th>
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
                            <td>{!! $item->book_stat !!}</td>
                            <td>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.destroy', $item->id) }}" data-name="{{ $item->name }}"
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
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama Paket</th>
                            <th class="text-center">Nama Klien</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Jam Pemesanan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Status Pesanan</th>
                            <th class="text-center">Aksi</th>
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
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @elseif(Str::is('admin/booking/verify', request()->path()))
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama Paket</th>
                            <th class="text-center">Nama Klien</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Jam Pemesanan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Status Pesanan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($verify as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->paket->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                            <td>{{ $item->book_time }}</td>
                            <td>{{ $item->paket->price }}</td>
                            <td>{!! $item->book_stat !!}</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-rounded btn-outline-primary" data-bs-toggle="modal" data-bs-target="#paymentView{{$item->id}}"><i class="fa-solid fa-eye"></i></a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.booking.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.booking.destroy', $item->id) }}" data-name="{{ $item->name }}"
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
@foreach ($verify as $item)
@if($item->book_stat == 'Menunggu Verifikasi')
<div class="modal fade" id="paymentView{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.book.product.verify', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header align-items-center" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel"><span style="font-size: 20px;">Lihat bukti pembayaran</span></h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <button style="margin-right: 5px;" type="submit" class="btn btn-rounded btn-outline-secondary">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-12 mb-3 text-center">
                        <img src="{{ asset('storage/images/prof/'.$item->book_prof) }}" alt="" style="max-height: 300px">
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="book_stat">Verifikasi Pembayaran</label>
                        <select name="book_stat" id="book_stat" class="form-control">
                            <option value="1" {{ $item->book_stat == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                            <option value="2" {{ $item->book_stat == 'Verifikasi Gagal'    ? 'selected' : '' }}>Verifikasi Gagal</option>
                            <option value="3" {{ $item->book_stat == 'Verifikasi Berhasil' ? 'selected' : '' }}>Verifikasi Berhasil</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endforeach
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
