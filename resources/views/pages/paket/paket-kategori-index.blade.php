@extends('base.base-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-3 col-12 mb-3">
        <form action="{{ route('admin.paket-kategori.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Buat Kategori Paket</span>
                    <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Kategori Paket</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan nama kategori paket...">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="col-lg-9 col-12 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px;">Daftar Kategori Paket</span>
                <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
            </div>
            <div class="card-body">
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Id Record</th>
                            <th>Nama Kategori</th>
                            <th>Slug Kategori</th>
                            <th>Created At</th>
                            <th>Tombol Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cpaket as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            @if($item->created_at)
                            <td>{{ $item->created_at->diffforhumans() }}</td>
                            @else
                            <td>Tidak ada data</td>
                            @endif
                            <td class="d-flex justify-content-center align-items-center">
                                <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#editPaket{{$item->id}}" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-eye"></i></a>
                                <a href="#" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#ubahKategoriPaket{{$item->id}}" class="btn btn-outline-secodary btn-rounded"><i class="fa-solid fa-edit"></i></a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.paket-kategori.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.paket-kategori.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach($cpaket as $key => $item)
<div class="modal fade" id="ubahKategoriPaket{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.paket-kategori.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Ubah Kategori Paket</h5>
                    <div class="d-flex justify-content-between align-items-center">

                        <button style="margin-right: 10px;" type="submit" class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button style="" type="submit" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name">Nama Kategori Paket</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Inputkan nama kategori paket..." value="{{ $item->name }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="slug">Slug Kategori Paket</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Inputkan slug kategori paket..." value="{{ $item->slug }}">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
@section('custom-js')
@include('base.include.include-datatables')
@include('base.include.include-swalerts-delete')
@endsection
