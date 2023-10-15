@extends('base.base-index')
@section('custom-css')
<link href="{{ asset('main') }}/vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/editors/quill/quill.snow.css">

@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12 mb-3">
        <form action="{{ route('author.blog.post-store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text" style="font-size: 20px;">{{ $submenu }}</span>
                <span class="icon">
                    <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-paper-plane"></i></button>
                </span>
            </div>
            <div class="row card-body">
                <div class="col-lg-4 mb-3">
                    <div class="form-group mb-2">
                        <img class="card-img-top img-fluid text-center mb-2" style="width: 450px; display: none;" alt="Image-Picture" id="image-preview">
                        <label for="cover">Cover Postingan</label>
                        <input type="file" name="cover" id="cover" class="form-control" placeholder="Input package cover...">
                        @error('cover') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-lg-8 mb-3">
                    <div class="form-group mb-2">
                        <label for="title">Judul Postingan</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Inputkan judul postingan..">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="category_id">Kategori Postingan</label>
                        <select name="category_id" id="category_id" class="form-select js-example-basic-single">
                            <option value="" selected>Pilih Kategori</option>
                            @foreach($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Pilih Tag</label>
                        <select name="tagsb[]" multiple id="tagsb[]" class="form-control js-example-basic-multiple">
                            <option value="" selected>Pilih Tag</option>
                            @foreach($tags as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('tagsb') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="desc">Content</label>
                        <input type="hidden" name="desc" id="desc" class="form-control" placeholder="Inputkan judul postingan..">
                        <div id="blog-description" style="min-height: 300px;"></div>
                        @error('desc') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Inputkan keywords postingan..">
                        @error('keywords') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="meta_desc">Judul Postingan</label>
                        <input type="text" name="meta_desc" id="meta_desc" class="form-control" placeholder="Inputkan meta desc postingan..">
                        @error('meta_desc') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('main') }}/vendor/select2/dist/js/select2.min.js"></script>
<script src="{{ asset('main') }}/src/plugins/src/editors/quill/quill.js"></script>

<script src="{{ asset('main') }}/src/plugins/src/tagify/tagify.min.js"></script>


<script>
var quill = new Quill('#blog-description', {
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block']
        ]
    },
    placeholder: 'Write product description...',
    theme: 'snow'  // or 'bubble'
});

var form = document.querySelector('form');
quill.on('text-change', function() {
    var blogDescription = document.querySelector('#desc');
    blogDescription.value = quill.root.innerHTML;
});

</script>
<script>
    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    // SELECT MULTIPLE
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
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
    const imageInput = document.getElementById('cover');
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
