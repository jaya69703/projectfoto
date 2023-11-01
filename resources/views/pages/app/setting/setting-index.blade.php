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
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">LOGO Website</span>
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
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">QRIS Website</span>
                    <span class="align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="qris-reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </span>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/images/web/'.$web->site_qris) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Image-Picture" id="qrisPreview">
                    <input type="file" id="site_qris" name="site_qris" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg" value="{{ $web->site_qris }}">
                    @error('site_qris') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Slider 1</span>
                    <span class="align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="qris-reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </span>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/images/web/'.$web->site_slide_1) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Image-Picture" id="image-preview">
                    <input type="file" id="site_slide_1" name="site_slide_1" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg" value="{{ $web->site_slide_1 }}">
                    @error('site_slide_1') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Slider 2</span>
                    <span class="align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="qris-reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </span>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/images/web/'.$web->site_slide_2) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Image-Picture" id="image-preview">
                    <input type="file" id="site_slide_2" name="site_slide_2" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg" value="{{ $web->site_slide_2 }}">
                    @error('site_slide_2') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Slider 3</span>
                    <span class="align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="qris-reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </span>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/images/web/'.$web->site_slide_3) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Image-Picture" id="image-preview">
                    <input type="file" id="site_slide_3" name="site_slide_3" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg" value="{{ $web->site_slide_3 }}">
                    @error('site_slide_3') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Slider 4</span>
                    <span class="align-items-center">
                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="qris-reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                    </span>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/images/web/'.$web->site_slide_4) }}" class="card-img-top img-fluid" style="width: 300px;" alt="Image-Picture" id="image-preview">
                    <input type="file" id="site_slide_4" name="site_slide_4" class="form-control mt-3" accept="image/x-png,image/gif,image/jpeg" value="{{ $web->site_slide_4 }}">
                    @error('site_slide_4') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px">Data Informasi Website</span>
                    <span class="">
                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                        <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-sync"></i></a>
                    </span>
                </div>
                <div class="row card-body">
                    <div class="form-group col-lg-4 col-12 mb-2">
                        <label for="name">Nama Website</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Input your web name..." value="{{ $web->name }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12 mb-2">
                        <label for="site_link">Link Website</label>
                        <input type="text" name="site_link" id="site_link" class="form-control" placeholder="Input your web site_link..." value="{{ $web->site_link }}">
                        @error('site_link') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12 mb-2">
                        <label for="site_social_fb">Social Link Facebook</label>
                        <input type="text" name="site_social_fb" id="site_social_fb" class="form-control" placeholder="Input your web site_social_fb..." value="{{ $web->site_social_fb }}">
                        @error('site_social_fb') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12 mb-2">
                        <label for="site_social_ig">Social Link Instagram</label>
                        <input type="text" name="site_social_ig" id="site_social_ig" class="form-control" placeholder="Input your web site_social_ig..." value="{{ $web->site_social_ig }}">
                        @error('site_social_ig') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12 mb-2">
                        <label for="site_social_tw">Social Link Twitter or X</label>
                        <input type="text" name="site_social_tw" id="site_social_tw" class="form-control" placeholder="Input your web site_social_tw..." value="{{ $web->site_social_tw }}">
                        @error('site_social_tw') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-4 col-12 mb-2">
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
<script>
    // Mendapatkan elemen-elemen yang dibutuhkan
    const qrisInput = document.getElementById('site_qris');
    const qrisPreview = document.getElementById('qrisPreview');
    const qrisResetButton = document.getElementById('qris-reset-button');

    // Simpan URL gambar awal sebagai nilai default
    const defaultQrisSrc = qrisPreview.src;

    // Fungsi untuk menampilkan pratinjau gambar
    function showQrisPreview(file, preview) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener ketika gambar diubah di input file
    qrisInput.addEventListener('change', function () {
        const selectedFile = this.files[0];
        showQrisPreview(selectedFile, qrisPreview);
    });

    // Event listener untuk tombol reset
    qrisResetButton.addEventListener('click', function () {
        // Kembalikan gambar ke gambar awal
        qrisPreview.src = defaultQrisSrc;
        // Reset nilai input file
        qrisInput.value = '';
    });
</script>
@include('base.include.include-previewimage-paketedit')
@endsection
