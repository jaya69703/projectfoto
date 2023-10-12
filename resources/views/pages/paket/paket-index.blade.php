@extends('base.base-index')
@section('custom-css')

<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-4 col-12 mb-4">
        <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Create {{ $submenu }}</span>
                    <span class="align-items-center">
                        <button type="submit" class="btn btn-rounded btn-outline-secondary">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                    </span>
                </div>
                <div class="card-body">
                    <div class="form-group mb-2">
                        <img class="card-img-top img-fluid text-center mb-2" style="width: 450px; display: none;" alt="Image-Picture" id="image-preview">

                        <label for="image">Package image</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Input package image...">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Package name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Input package name...">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="form-group mb-2">
                        <label for="price">Package price</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Input package price...">
                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Package description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Input package description..."></textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8 col-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">{{ $submenu }}</span>
                <span class="align-items-center">
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="card-body">
                <table id="style-3" class="table style-3 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Record Id</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $key => $item)

                        <tr>

                            <td class="text-center">{{ ++$key }}</td>
                            <td class="text-center"><img src="{{ asset('storage/images/paket/'.$item->image) }}" alt="Paket-Picture" width="48px" class="rounded"></td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->price }}</td>
                            <td class="text-center">{{ $item->description }}</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a  href="{{ route('admin.paket.show', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-warning bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Show" data-original-title="Show">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                @if($item->type == 'User')
                                <a  href="#" data-bs-toggle="modal" data-bs-target="#editUser{{$item->id}}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.paket.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.paket.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                                @else
                                <a  href="{{ route('admin.paket.edit', $item->id) }}" style="margin-right: 10px;" class="btn btn-rounded btn-outline-success bs-tooltip me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.usermanage.worker.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"
                                        data-url="{{ route('admin.usermanage.worker.destroy', $item->id) }}" data-name="{{ $item->name }}"
                                        onclick="deleteData('{{ $item->id }}')">
                                        <i class="fa-solid fa-trash-can"></i>
                                     </a>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Modal Create User --}}
<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
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
                            <option value="0">User</option>
                            <option value="1">Worker</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- Modal Edit User --}}
@foreach($paket as $key => $item)
<div class="modal fade" id="editUser{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.paket.update', $item->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="isverify">Status User</label>
                        <select name="isverify" id="isverify" class="form-control">
                            <option value="" selected>Choose Status User</option>
                            <option value="0" {{ $item->isverify == '0' ? 'selected' : '' }}>Belum Verify</option>
                            <option value="1" {{ $item->isverify == '1' ? 'selected' : '' }}>Sudah Verify</option>
                        </select>
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
<script>
    // Mendapatkan elemen-elemen yang dibutuhkan
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    // Simpan URL gambar awal sebagai nilai default
    const defaultImageSrc = imagePreview.src;

    // Fungsi untuk menampilkan pratinjau gambar
    function showImagePreview(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Menampilkan tag img saat gambar tersedia
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener ketika gambar diubah di input file
    imageInput.addEventListener('change', function () {
        const selectedFile = this.files[0];
        showImagePreview(selectedFile);
    });

    // Event listener untuk menghilangkan pratinjau gambar dan mereset input file
    imageInput.addEventListener('click', function () {
        if (imageInput.value === '') {
            imagePreview.style.display = 'none'; // Menghilangkan tag img saat tidak ada gambar yang dipilih
        }
    });
</script>
@endsection
