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
                            <td class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-rounded btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateStatus{{$item->id}}"><i class="fa-solid fa-eye"></i></a>
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
                            <td class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-rounded btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateStatus{{$item->id}}"><i class="fa-solid fa-eye"></i></a>
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
                            <td class="d-flex justify-content-between align-items-center">
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
@foreach ($all as $item)
<div class="modal fade" id="updateStatus{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
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
                            <option value="2" {{ $item->book_stat == 'Diterima'    ? 'selected' : '' }}>Diterima</option>
                            <option value="3" {{ $item->book_stat == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="4" {{ $item->book_stat == 'Menunggu Penjadwalan' ? 'selected' : '' }}>Menunggu Penjadwalan</option>
                            <option value="5" {{ $item->book_stat == 'Sedang Foto Shot' ? 'selected' : '' }}>Sedang Foto Shot</option>
                            <option value="6" {{ $item->book_stat == 'Tahap Editing Foto' ? 'selected' : '' }}>Tahap Editing Foto</option>
                            <option value="7" {{ $item->book_stat == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    @if($item->book_stat == 'Selesai')
                    <div class="form-group col-12 mb-3">
                        <label for="book_done">Lihat Link Google Drive</label>
                        <textarea name="book_done" id="book_done" class="form-control" cols="30" rows="10" value="{{ $item->book_done }}">{{ $item->book_done }}</textarea>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
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
                            <option value="2" {{ $item->book_stat == 'Diterima'    ? 'selected' : '' }}>Diterima</option>
                            <option value="3" {{ $item->book_stat == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="4" {{ $item->book_stat == 'Menunggu Penjadwalan' ? 'selected' : '' }}>Menunggu Penjadwalan</option>
                            <option value="5" {{ $item->book_stat == 'Sedang Foto Shot' ? 'selected' : '' }}>Sedang Foto Shot</option>
                            <option value="6" {{ $item->book_stat == 'Tahap Editing Foto' ? 'selected' : '' }}>Tahap Editing Foto</option>
                            <option value="7" {{ $item->book_stat == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    @if($item->book_stat == 'Selesai')
                    <div class="form-group col-12 mb-3">
                        <label for="book_done">Lihat Link Google Drive</label>
                        <textarea name="book_done" class="form-control" id="book_done" cols="30" rows="10" value="{{ $item->book_done }}">{{ $item->book_done }}</textarea>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endforeach
@endsection
@section('custom-js')

@include('base.include.include-datatables')
@include('base.include.include-swalerts-delete')
@endsection
