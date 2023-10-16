@extends('base.base-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12 mb-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text" style="font-size: 20px">{{ $submenu }}</span>
                <span class="icon"></span>
            </div>
            <div class="card-body">
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
                        @foreach ($book as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->paket->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->book_date)->formatLocalized('%A, %d %B %Y') }}</td>
                            <td>{{ $item->book_time }}</td>
                            <td>{{ $item->paket->price }}</td>
                            <td>{!! $item->book_stat !!}</td>
                            <td>
                                <a href="#" class="btn btn-rounded btn-outline-primary" data-bs-toggle="modal" data-bs-target="#uploadPhoto{{$item->id}}" style="margin-right: 5px"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach ($book as $item)
@if($item->book_stat == 'Tahap Editing Hasil Foto')
<div class="modal fade" id="uploadPhoto{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('author.book.product.sending', $item->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="book_done">Kirim tautan Paket</label>
                        <textarea name="book_done" id="book_done" class="form-control" cols="30" rows="10" placeholder="Inputkan link Google Drive disini"></textarea>
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

@include('base.include.include-datatables')
@endsection
