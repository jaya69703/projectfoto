@extends('base.base-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">

<style>
    .right{
        margin-right: 10px;
    }
</style>

@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">{{ $submenu }}</span>
                <span class="align-items-center">
                    <a href="#" class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#createTodo"><i class="fa-solid fa-plus"></i></a>
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="card-body">
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Record Id</th>
                            <th>Title</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>UpdateAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todo as $key => $item)
                        @if ($item->user_id == Auth::user()->id)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="text-center">{{ $item->end_date }}</td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">{{ $item->updated_at->diffforhumans() }}</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-outline-warning btn-rounded right" data-bs-toggle="modal" data-bs-target="#showTodo"><i class="fa-solid fa-eye"></i></a>
                                <a href="#" class="btn btn-outline-success btn-rounded right" data-bs-toggle="modal" data-bs-target="#editTodo"><i class="fa-solid fa-edit"></i></a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('auth.app.todo.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('auth.app.todo.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
{{-- MODAL CREATE --}}
<div class="modal fade" id="createTodo" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('auth.app.todo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Create {{ $submenu }}</h5>
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
                    <div class="form-group col-12 mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Input todo title...">
                        @error('title')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" class="form-control" cols="30" rows="10" placeholder="Input todo description..."></textarea>
                        @error('desc')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="end_date">Deadline</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Input todo deadline...">
                        @error('end_date')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="status">Choose Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="" selected>Choose Status</option>
                            <option value="OnProgress">OnProgress</option>
                            <option value="Pending">Pending</option>
                            <option value="Finished">Finished</option>
                        </select>
                        @error('status')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- MODAL EDIT --}}
@foreach ($todo as $key => $item)
<div class="modal fade" id="editTodo" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('auth.app.todo.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Edit {{ $submenu }}</h5>
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
                    <div class="form-group col-12 mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Input todo title..." value="{{ $item->title }}">
                        @error('title')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" class="form-control" cols="30" rows="10" placeholder="Input todo description..." value="{{ $item->desc }}">{{ $item->desc }}</textarea>
                        @error('desc')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="end_date">Deadline</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Input todo deadline..." value="{{ $item->end_date }}">
                        @error('end_date')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="status">Choose Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="" selected>Choose Status</option>
                            <option value="OnProgress" {{ $item->status == 'OnProgress' ? 'selected' : '' }}>OnProgress</option>
                            <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Finished" {{ $item->status == 'Finished' ? 'selected' : '' }}>Finished</option>
                        </select>
                        @error('status')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
{{-- MODAL SHOW --}}
@foreach ($todo as $key => $item)
<div class="modal fade" id="showTodo" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('auth.app.todo.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Edit {{ $submenu }}</h5>
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
                    <div class="form-group col-12 mb-2">
                        <label for="title">Title</label>
                        <input disabled  type="text" name="title" id="title" class="form-control" placeholder="Input todo title..." value="{{ $item->title }}">
                        @error('title')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="desc">Description</label>
                        <textarea disabled name="desc" id="desc" class="form-control" cols="30" rows="10" placeholder="Input todo description..." value="{{ $item->desc }}">{{ $item->desc }}</textarea>
                        @error('desc')<small class="text-danger">{{ $message }}</small> @enderror
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
