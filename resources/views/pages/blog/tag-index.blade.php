@extends('base.base-index')
@section('custom-css')
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-4 mb-3">
        <form action="{{ route('author.blog.tags-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="text" style="font-size: 20px;">Tambah Tag</span>
                    <span class="icon"><button type="submit" class="btn btn-outline-success btn-rounded"><i class="fa-solid fa-plus"></i></button></span>
                </div>
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label for="name">Nama Tag</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama tag...">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="keywords">Keywords Tag</label>
                        <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Inputkan keywords tag...">
                        @error('keywords') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="meta_desc">Meta Description</label>
                        <input type="text" class="form-control" name="meta_desc" id="meta_desc" placeholder="Inputkan meta description tag...">
                        @error('meta_desc') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text" style="font-size: 20px;">Daftar Tag</span>
                <span class="icon">
                    {{-- <button type="submit" class="btn btn-outline-success btn-rounded"><i class="fa-solid fa-plus"></i></button> --}}
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="card-body">
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama Tag</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Keywords</th>
                            <th class="text-center">Meta Description</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $key => $item)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->keywords }}</td>
                            <td>{{ $item->meta_desc }}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-rounded btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateTags{{$item->id}}" style="margin-right: 5px"><i class="fa-solid fa-edit"></i></a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('author.blog.tags-destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('author.blog.tags-destroy', $item->id) }}" data-name="{{ $item->name }}"
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
@foreach ($tags as $item)
<div class="modal fade" id="updateTags{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('author.blog.tags-update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header align-items-center" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel"><span style="font-size: 20px;">Edit Tags</span></h5>
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
                    <div class="form-group mb-2">
                        <label for="name">Nama Tag</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Inputkan nama tag..." value="{{ $item->name }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="slug">Slug Tag</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Inputkan slug tag..." value="{{ $item->slug }}">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="keywords">Keywords Tag</label>
                        <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Inputkan keywords tag..." value="{{ $item->keywords }}">
                        @error('keywords') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="meta_desc">Meta Description</label>
                        <input type="text" class="form-control" name="meta_desc" id="meta_desc" placeholder="Inputkan meta description tag..." value="{{ $item->meta_desc }}">
                        @error('meta_desc') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
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
