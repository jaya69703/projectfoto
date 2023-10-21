@extends('base.base-index')
@section('custom-css')
<style>
    .right{
        margin-right: 10px;
    }
</style>
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-4 col-12 mb-3">
        <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text" style="font-size: 20px;">Tambah Halaman</span>
                <span class="icon">
                    <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-paper-plane"></i></button>
                    {{-- <a href="#" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-paper-plane"></i></a> --}}
                </span>
            </div>
            <div class="card-body">
                <div class="form-group mb-2">
                    <label for="page_type">Tipe Halaman</label>
                    <select name="page_type" id="page_type" class="form-select">
                        <option value="" selected>Pilih Tipe Halaman</option>
                        <option value="0">Halaman Utama</option>
                        <option value="1">Sub Halaman</option>
                    </select>
                    @error('page_type') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="page_id">Pilih Halaman Utama</label>
                    <select name="page_id" id="page_id" class="form-select">
                        <option value="" selected>Pilih Halaman Utama</option>
                        @forelse($tpage as $item)
                        <option value="{{ $item->id }}">{{ $item->page_name }}</option>
                        @empty
                        <option value="">Belum ada halaman</option>
                        @endforelse
                    </select>
                    @error('page_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="page_name">Nama Halaman</label>
                    <input type="text" name="page_name" id="page_name" class="form-control" placeholder="Inputkan nama halaman...">
                    @error('page_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="page_link">Link Halaman</label>
                    <input type="text" name="page_link" id="page_link" class="form-control" placeholder="Inputkan Link Halaman...">
                    @error('page_link') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="page_desc">Deskripsi Halaman</label>
                    <textarea name="page_desc" id="page_desc" class="form-control" placeholder="Inputkan Deskripsi Halaman..." cols="30" rows="10"></textarea>
                    @error('page_desc') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="col-lg-8 col-12 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text" style="font-size: 20px">Daftar Halaman</span>
                <span class="icon">
                    <a href="#" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nama Halaman</th>
                                <th>Link Halaman</th>
                                <th>Stat Halaman</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($page as $key => $item)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td>{{ $item->page_name }}</td>
                                <td class="text-center">{{ $item->page_link }}</td>
                                @if($item->page_type == 0)
                                <td class="text-center"><span class="badge badge-success">Main Page</span></td>
                                @else
                                <td class="text-center"><span class="badge badge-danger">Sub Page</span></td>
                                @endif
                                <td class="text-center d-flex justify-content-start align-items-center">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editPage{{$item->id}}" class="btn btn-outline-secondary btn-rounded right"><i class="fa-solid fa-edit"></i></a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.pages.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                            data-url="{{ route('admin.pages.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                            onclick="deleteData('{{ $item->id }}')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="5">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($page as $key => $item)
<div class="modal fade" id="editPage{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.pages.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Edit Halaman {{ $item->page_name }}</h5>
                    <div class="d-flex justify-content-between align-items-center">

                        <button style="margin-right: 10px;" type="submit" class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="page_type">Tipe Halaman</label>
                        <select name="page_type" id="page_type" class="form-select">
                            <option value="" selected>Pilih Tipe Halaman</option>
                            <option value="0" {{ $item->page_type == 0 ? 'selected' : '' }}>Halaman Utama</option>
                            <option value="1" {{ $item->page_type == 1 ? 'selected' : '' }}>Sub Halaman</option>
                        </select>
                        @error('page_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="page_id">Pilih Halaman Utama</label>
                        <select name="page_id" id="page_id" class="form-select">
                            <option value="" selected>Pilih Halaman Utama</option>
                            @forelse($tpage as $pg)
                            <option value="{{ $pg->id }}" {{ $item->page_id == $pg->id ? 'selected' : '' }}>{{ $pg->page_name }}</option>
                            @empty
                            <option value="">Belum ada halaman</option>
                            @endforelse
                        </select>
                        @error('page_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="page_name">Nama Halaman</label>
                        <input type="text" name="page_name" id="page_name" class="form-control" value="{{ $item->page_name }}" placeholder="Inputkan nama halaman...">
                        @error('page_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="page_link">Link Halaman</label>
                        <input type="text" name="page_link" id="page_link" class="form-control" value="{{ $item->page_link }}" placeholder="Inputkan Link Halaman...">
                        @error('page_link') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="page_desc">Deskripsi Halaman</label>
                        <textarea name="page_desc" id="page_desc" class="form-control" value="{{ $item->page_desc }}" placeholder="Inputkan Deskripsi Halaman..." cols="30" rows="10">{{ $item->page_desc }}</textarea>
                        @error('page_desc') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
@section('custom-js')
@include('base.include.include-swalerts-delete')
@endsection
