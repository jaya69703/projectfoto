@extends('base.base-index')
@section('custom-css')
@endsection
@section('content')
    <form action="{{ route('author.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row layout-top-spacing">
            <div class="col-lg-4 col-12 mb-3">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span style="font-size: 20px;">Cover Gallery</span>
                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <div class="text-center">
    
                                <img class="card-img-top img-fluid text-center mb-2" style="width: 450px; display: none;" alt="Image-Picture" id="cover-preview">
                            </div>
                            <label for="cover">Pilih Cover Gallery</label>
                            <input type="file" name="cover" id="cover" class="form-control">
                            @error('cover') <small class="text-center">{{ $message }}</small> @enderror

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 mb-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span style="font-size: 20px;">Tambah Gallery</span>
                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="cpaket_id">Pilih Kategori Paket</label>
                            <select name="cpaket_id" id="cpaket_id" class="form-select">
                                <option selected>Pilih Kategori</option>
                                @foreach ($cpaket as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('cpaket_id') <small class="text-center">{{ $message }}</small> @enderror

                        </div>
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="paket_id">Pilih Paket</label>
                            <select name="paket_id" id="paket_id" class="form-select">
                                <option selected>Pilih Paket</option>
                                @foreach ($paket as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('paket_id') <small class="text-center">{{ $message }}</small> @enderror

                        </div>
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="name">Gallery Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Input your name...">
                            @error('name') <small class="text-center">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="image_1">Image 1</label>
                            <input type="file" name="image_1" id="image_1" class="form-control" placeholder="Input your image...">
                            @error('image_1') <small class="text-center">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="image_2">Image 2</label>
                            <input type="file" name="image_2" id="image_2" class="form-control" placeholder="Input your image...">
                            @error('image_2') <small class="text-center">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="image_3">Image 3</label>
                            <input type="file" name="image_3" id="image_3" class="form-control" placeholder="Input your image...">
                            @error('image_3') <small class="text-center">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="image_4">Image 4</label>
                            <input type="file" name="image_4" id="image_4" class="form-control" placeholder="Input your image...">
                            @error('image_4') <small class="text-center">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12 mb-2">
                            <label for="image_5">Image 5</label>
                            <input type="file" name="image_5" id="image_5" class="form-control" placeholder="Input your image...">
                            @error('image_5') <small class="text-center">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12 mb-2">
                            <label for="desc">Gallery Description</label>
                            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" placeholder="Input your gallery description..."></textarea>
                            @error('desc') <small class="text-center">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('custom-js')
<script>
    // Mendapatkan elemen-elemen yang dibutuhkan
    const coverInput = document.getElementById('cover');
    const coverPreview = document.getElementById('cover-preview');

    // Simpan URL gambar awal sebagai nilai default
    const defaultImageSrc = coverPreview.src;

    // Fungsi untuk menampilkan pratinjau gambar
    function showcoverPreview(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                coverPreview.src = e.target.result;
                coverPreview.style.display = 'block'; // Menampilkan tag img saat gambar tersedia
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener ketika gambar diubah di input file
    coverInput.addEventListener('change', function () {
        const selectedFile = this.files[0];
        showcoverPreview(selectedFile);
    });

    // Event listener untuk menghilangkan pratinjau gambar dan mereset input file
    coverInput.addEventListener('click', function () {
        if (coverInput.value === '') {
            coverPreview.style.display = 'none'; // Menghilangkan tag img saat tidak ada gambar yang dipilih
        }
    });
</script>
@endsection
