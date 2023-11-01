@extends('base.base-index')
@section('custom-css')
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Daftar Galeri</span>
                    <a href="{{ route('author.gallery.create') }}" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table id="style-3" class="table style-3 dt-table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Cover</th>
                                <th class="text-center">Nama Gallery</th>
                                <th class="text-center">Kategori Paket</th>
                                <th class="text-center">Nama Paket</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $key => $item)
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>
                                    <td class="text-center"><img src="{{ asset('storage/'. $item->cover) }}" alt="Paket-Picture" width="200px" class="rounded"></td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->cpaket->name }}</td>
                                    <td class="text-center">{{ $item->paket->name }}</td>
                                    <td class="text-center">{{ $item->user->name }}</td>
                                    <td class="text-center d-flex justify-content-center align-items-center">
                                        <a href="{{ route('author.gallery.edit', $item->id) }}" class="btn btn-rounded btn-outline-primary" style="margin-right: 10px;" ><i class="fa-solid fa-edit"></i></a>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('author.gallery.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                                data-url="{{ route('author.gallery.destroy', $item->id) }}" data-name="{{ $item->name }}"
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
@endsection
@section('custom-js')
    @include('base.include.include-datatables')
    @include('base.include.include-swalerts-delete')
@endsection
