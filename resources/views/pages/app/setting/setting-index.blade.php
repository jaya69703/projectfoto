@extends('base.base-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">

<style>
.right{
    margin-right: 10px;
}
</style>

@php
$web = App\Models\WebSetting::find(1);
@endphp

@endsection
@section('content')
<form action="{{ route('admin.app.setting.update') }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row layout-top-spacing">
        <div class="col-lg-3 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Logo {{ $submenu }}</span>
                    <span class="align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </span>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/images/web/'.$web->image) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Image-Picture" id="image-preview">
                    <input type="file" id="image" name="image" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg" value="{{ $web->image }}">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">{{ $submenu }}</span>
                    <span class="align-items-center">
                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                        <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                    </span>
                </div>
                <div class="row card-body">
                    <div class="form-group col-lg-6 col-12 mb-2">
                        <label for="name">Website name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Input your web name..." value="{{ $web->name }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="form-group col-lg-6 col-12 mb-2">
                        <label for="site_link">Website link</label>
                        <input type="text" name="site_link" id="site_link" class="form-control" placeholder="Input your web site_link..." value="{{ $web->site_link }}">
                        @error('site_link') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-6 col-12 mb-2">
                        <label for="site_social_fb">Social Link Facebook</label>
                        <input type="text" name="site_social_fb" id="site_social_fb" class="form-control" placeholder="Input your web site_social_fb..." value="{{ $web->site_social_fb }}">
                        @error('site_social_fb') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-6 col-12 mb-2">
                        <label for="site_social_ig">Social Link Instagram</label>
                        <input type="text" name="site_social_ig" id="site_social_ig" class="form-control" placeholder="Input your web site_social_ig..." value="{{ $web->site_social_ig }}">
                        @error('site_social_ig') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-6 col-12 mb-2">
                        <label for="site_social_tw">Social Link Twitter or X</label>
                        <input type="text" name="site_social_tw" id="site_social_tw" class="form-control" placeholder="Input your web site_social_tw..." value="{{ $web->site_social_tw }}">
                        @error('site_social_tw') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-6 col-12 mb-2">
                        <label for="site_social_in">Social Link LinkedIn</label>
                        <input type="text" name="site_social_in" id="site_social_in" class="form-control" placeholder="Input your web site_social_in..." value="{{ $web->site_social_in }}">
                        @error('site_social_in') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('modal')
@endsection
@section('custom-js')
<script>

    // Mendapatkan elemen-elemen yang dibutuhkan
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const resetButton = document.getElementById('reset-button');

    // Simpan URL gambar awal sebagai nilai default
    const defaultImageSrc = imagePreview.src;

    // Fungsi untuk menampilkan pratinjau gambar
    function showImagePreview(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener ketika gambar diubah di input file
    imageInput.addEventListener('change', function () {
        const selectedFile = this.files[0];
        showImagePreview(selectedFile);
    });

    // Event listener untuk tombol reset
    resetButton.addEventListener('click', function () {
        // Kembalikan gambar ke gambar awal
        imagePreview.src = defaultImageSrc;
        // Reset nilai input file
        imageInput.value = '';
    });
</script>
@endsection
