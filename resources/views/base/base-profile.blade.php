@extends('base.base-index')
@section('custom-css')
    <link href="{{ asset('main') }}/src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('main') }}/src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main') }}/src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="layout-top-spacing">
        @include('base.base-profile-sadmin')
        @include('base.base-profile-admin')
        @include('base.base-profile-author')
        @include('base.base-profile-user')
    </div>
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
