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
                    <a href="{{ route('author.blog.post-index') }}" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-backward"></i></a>
                    <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-paper-plane"></i></button>
                </span>
            </div>
            <div class="row card-body">
                <div class="col-lg-4 mb-3">
                    <div class="form-group mb-2">
                        <img src="{{ asset('storage/images/cover/'.$posts->cover) }}" class="card-img-top img-fluid text-center mb-2" style="width: 450px;" alt="Image-Picture" id="image-preview">
                        <label for="cover">Cover Postingan</label>
                        <input type="file" name="cover" id="cover" class="form-control" placeholder="Input package cover...">
                        @error('cover') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col-lg-8 mb-3">
                    <div class="form-group mb-2">
                        <label for="title">Judul Postingan</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Inputkan judul postingan.." value="{{ $posts->title }}">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="category_id">Kategori Postingan</label>
                        <select name="category_id" id="category_id" class="form-select js-example-basic-single">
                            <option value="" selected>Pilih Kategori</option>
                            @foreach($category as $item)
                            <option value="{{ $item->id }}" {{ $posts->category->id === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Pilih Tag</label>
                        <select name="tagsb[]" multiple id="tagsb[]" class="form-control js-example-basic-multiple">
                            <option value="" selected>Pilih Tag</option>
                            @foreach($tags as $item)
                            <option value="{{ $item->id }}"     {{ in_array($item->id, old('tagsb', $posts->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('tagsb') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="desc">Content</label>
                        <input type="hidden" name="desc" id="desc" class="form-control" placeholder="Inputkan judul postingan.." value="{{ old('desc', $posts->desc) }}">
                        <div id="blog-description" style="min-height: 300px;">{!! old('desc', $posts->desc) !!}</div>
                        @error('desc') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Inputkan keywords postingan.." value="{{ old('keywords', $posts->keywords) }}" >
                        @error('keywords') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="meta_desc">Meta Description</label>
                        <input type="text" name="meta_desc" id="meta_desc" class="form-control" placeholder="Inputkan meta desc postingan.." value="{{ old('meta_desc', $posts->meta_desc) }}">
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
@include('base.include.include-datatables')
@include('base.include.include-swalerts-delete')


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
