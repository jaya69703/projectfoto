@extends('base.base-index')
@section('custom-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('main') }}/src/plugins/css/light/table/datatable/custom_dt_custom.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('main') }}/src/plugins/css/dark/table/datatable/custom_dt_custom.css">
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-lg-4 col-12 mb-4">
            <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span style="font-size: 20px">Tambah {{ $submenu }}</span>
                        <span class="align-items-center">
                            <button type="submit" class="btn btn-rounded btn-outline-secondary">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <a href="" class="btn btn-outline-warning btn-rounded"><i
                                    class="fa-solid fa-sync"></i></a>
                        </span>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-2">
                            <img class="card-img-top img-fluid text-center mb-2" style="width: 450px; display: none;"
                                alt="Image-Picture" id="image-preview">

                            <label for="image">Cover Paket</label>
                            <input type="file" name="image" id="image" class="form-control"
                                placeholder="Input package image...">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="cpaket_id">Pilih Kategori Paket</label>
                            <select name="cpaket_id" id="cpaket_id" class="form-select">
                                <option value="">Pilih Kategori</option>
                                @foreach ($cpaket as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('cpaket_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="name">Nama Paket</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Input package name...">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="price">Harga Paket</label>
                            <input type="text" name="price" id="price" class="form-control"
                                placeholder="Input package price...">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group mb-2">
                            <label for="description">Deskripsi Paket</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                                placeholder="Input package description..."></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

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
                                <th class="text-center">Id</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paket as $key => $item)
                                <tr>

                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center"><img src="{{ asset('storage/images/paket/' . $item->image) }}"
                                            alt="Paket-Picture" width="48px" class="rounded"></td>
                                    <td class="">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->price }}</td>
                                    <td class="text-center d-flex justify-content-center align-items-center">
                                        <a href="{{ route('root.pages.package.show', $item->slug) }}"
                                            class="btn btn-outline-secondary btn-rounded" style="margin-right: 5px"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('admin.paket.edit', $item->id) }}"
                                            class="btn btn-outline-primary btn-rounded" style="margin-right: 5px"><i
                                                class="fa-solid fa-edit"></i></a>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('admin.paket.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="button" class="bs-tooltip btn btn-rounded btn-outline-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                data-original-title="Delete"
                                                data-url="{{ route('admin.paket.destroy', $item->id) }}"
                                                data-name="{{ $item->name }}"
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
    {{-- MODAL UPDATE PAKET --}}
    @foreach ($paket as $key => $item)
        <div class="modal bd-example-modal-xl fade" id="editPaket{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="tabsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <form action="{{ route('admin.paket.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-content">
                        <div class="modal-header" style="font-size: 20px">
                            <h5 class="modal-title" id="tabsModalLabel">Edit {{ $submenu }}</h5>
                            <div class="d-flex justify-content-between align-items-center">

                                <button style="margin-right: 10px;" type="submit"
                                    class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <button style="" type="button" class="btn btn-rounded btn-outline-warning"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-12 form-group mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top img-fluid mb-2" src="{{ asset('storage/images/paket/' . $item->image) }}"
                                            style="width: 450px;" alt="Image-Picture" id="image-preview">
                                    </div>
                                    <label for="image">Cover Image</label>
                                    <input type="file" name="image" id="image" class="form-control" value="{{ $item->image }}">
                                </div>
                        
                                @for($i = 1; $i <= 4; $i++)
                                <div class="col-lg-6 col-12 form-group mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top img-fluid mb-2"
                                            src="{{ asset('storage/images/paket/' . $item['image_' . $i]) }}" style="width: 450px;"
                                            alt="Image-Picture" id="image-preview-{{ $i }}">
                                    </div>
                                    <label for="image_{{ $i }}">Image Plus {{ $i }}</label>
                                    <input type="file" name="image_{{ $i }}" id="image_{{ $i }}" class="form-control"
                                        value="{{ $item['image_' . $i] }}">
                                </div>
                                @endfor
                            </div>
                            <div class="row">

                                <div class="col-lg-6 col-12 form-group mb-2">
                                    <label for="cpaket_id">Kategori Paket</label>
                                    <select name="cpaket_id" id="cpaket_id" class="form-select">
                                        <option value="" selected>Pilih Kategori Paket</option>
                                        @foreach ($cpaket as $cpake)
                                            <option value="{{ $cpake->id }}"
                                                {{ $cpake->id == $item->id ? 'selected' : '' }}>{{ $cpake->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-12 form-group mb-2">
                                    <label for="name">Nama Paket</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Input package name..." value="{{ $item->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-12 form-group mb-2">
                                    <label for="price">Harga Paket</label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        placeholder="Input package price..." value="{{ $item->price }}">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-12 form-group mb-2">
                                    <label for="description">Deskripsi Paket</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                                        placeholder="Input package description..." value="{{ $item->description }}"> {{ $item->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
@section('custom-js')
    @include('base.include.include-datatables')
    @include('base.include.include-swalerts-delete')
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
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; // Menampilkan tag img saat gambar tersedia
                };
                reader.readAsDataURL(file);
            }
        }

        // Event listener ketika gambar diubah di input file
        imageInput.addEventListener('change', function() {
            const selectedFile = this.files[0];
            showImagePreview(selectedFile);
        });

        // Event listener untuk menghilangkan pratinjau gambar dan mereset input file
        imageInput.addEventListener('click', function() {
            if (imageInput.value === '') {
                imagePreview.style.display = 'none'; // Menghilangkan tag img saat tidak ada gambar yang dipilih
            }
        });
    </script>
@endsection
