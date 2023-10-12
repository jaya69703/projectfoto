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
                <span style="font-size: 20px">Daftar {{ $submenu }}</span>
                <span class="align-items-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#createUser" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-user-plus"></i></a>
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="card-body">
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Record Id</th>
                            <th class="text-center">Fullname</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    @include('pages.usermanage.usermanage-admin')
                    @include('pages.usermanage.usermanage-member')
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Tambah User --}}
<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.usermanage.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="name">Fullname</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Input your Fullname...">
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Input your Phone Number...">
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Input your Email Address...">
                    </div>
                    <div class="form-group col-12 mb-2">
                        <label for="type">Type User</label>
                        <select name="type" id="type" class="form-control">
                            <option value="" selected>Choose Type User</option>
                            <option value="0">Member</option>
                            <option value="1">Member Plus</option>
                            <option value="2">Author</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
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
