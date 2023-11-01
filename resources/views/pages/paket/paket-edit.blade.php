@extends('base.base-index')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/dark/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/src/plugins/css/light/editors/quill/quill.snow.css">
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span style="font-size: 20px;">{{ $submenu . ' - ' . $paket->name }}</span>
                    <span class="icon">
                        <a href="{{ route('admin.paket.index') }}" class="btn btn-outline-warning btn-rounded"><i
                                class="fa-solid fa-backward"></i></a>
                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i
                                class="fa-solid fa-paper-plane"></i></button>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <div class="text-center">
                                <img class="card-img-top img-fluid mb-2"
                                    src="{{ asset('storage/images/paket/' . $paket->image) }}" style="width: 450px;"
                                    alt="Image-Picture" id="image-preview">
                            </div>
                            <label for="image">Cover Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                value="{{ $paket->image }}">
                        </div>
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <div class="text-center">
                                @if($paket->image_1 != null )
                                <img class="card-img-top img-fluid mb-2"
                                    src="{{ asset('storage/images/paket/' . $paket->image_1) }}"
                                    style="width: 450px;" alt="Image-Picture" id="image-preview">
                                @else
                                    <img class="card-img-top img-fluid mb-2"
                                        src="{{ asset('storage/images/paket/' . $paket->image_1) }}"
                                        style="width: 450px; display: none;" alt="Image-Picture" id="image-preview">
                                @endif
                            </div>
                            <label for="image_1">Image Plus 1</label>
                            <input type="file" name="image_1" id="image_1" class="form-control"
                                value="{{ $paket->image_1 }}">
                        </div>
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <div class="text-center">
                                @if($paket->image_2 != null )
                                <img class="card-img-top img-fluid mb-2"
                                    src="{{ asset('storage/images/paket/' . $paket->image_2) }}"
                                    style="width: 450px;" alt="Image-Picture" id="image-preview">
                                @else
                                    <img class="card-img-top img-fluid mb-2"
                                        src="{{ asset('storage/images/paket/' . $paket->image_2) }}"
                                        style="width: 450px; display: none;" alt="Image-Picture" id="image-preview">
                                @endif
                            </div>
                            <label for="image_2">Image Plus 2</label>
                            <input type="file" name="image_2" id="image_2" class="form-control"
                                value="{{ $paket->image_2 }}">
                        </div>
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <div class="text-center">
                                @if($paket->image_3 != null )
                                <img class="card-img-top img-fluid mb-2"
                                    src="{{ asset('storage/images/paket/' . $paket->image_3) }}"
                                    style="width: 450px;" alt="Image-Picture" id="image-preview">
                                @else
                                    <img class="card-img-top img-fluid mb-2"
                                        src="{{ asset('storage/images/paket/' . $paket->image_3) }}"
                                        style="width: 450px; display: none;" alt="Image-Picture" id="image-preview">
                                @endif
                            </div>
                            <label for="image_3">Image Plus 3</label>
                            <input type="file" name="image_3" id="image_3" class="form-control"
                                value="{{ $paket->image_3 }}">
                        </div>
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <div class="text-center">
                                @if($paket->image_4 != null )
                                <img class="card-img-top img-fluid mb-2"
                                    src="{{ asset('storage/images/paket/' . $paket->image_4) }}"
                                    style="width: 450px;" alt="Image-Picture" id="image-preview">
                                @else
                                    <img class="card-img-top img-fluid mb-2"
                                        src="{{ asset('storage/images/paket/' . $paket->image_4) }}"
                                        style="width: 450px; display: none;" alt="Image-Picture" id="image-preview">
                                @endif
                            </div>
                            <label for="image_4">Image Plus 4</label>
                            <input type="file" name="image_4" id="image_4" class="form-control"
                                value="{{ $paket->image_4 }}">
                        </div>
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <div class="text-center">
                                @if($paket->image_5 != null )
                                <img class="card-img-top img-fluid mb-2"
                                    src="{{ asset('storage/images/paket/' . $paket->image_5) }}"
                                    style="width: 450px;" alt="Image-Picture" id="image-preview">
                                @else
                                    <img class="card-img-top img-fluid mb-2"
                                        src="{{ asset('storage/images/paket/' . $paket->image_5) }}"
                                        style="width: 450px; display: none;" alt="Image-Picture" id="image-preview">
                                @endif
                            </div>
                            <label for="image_5">Image Plus 5</label>
                            <input type="file" name="image_5" id="image_5" class="form-control"
                                value="{{ $paket->image_5 }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <label for="cpaket_id">Pilih Kategori Paket</label>
                            <select name="cpaket_id" id="cpaket_id" class="form-select">
                                <option value="">Pilih Kategori Paket</option>
                                @foreach ($cpaket as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $paket->cpaket->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('cpaket_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <label for="name">Nama Paket</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Inputkan nama paket..." value="{{ $paket->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-12 mb-2 form-group">
                            <label for="price">Harga Paket</label>
                            <input type="text" name="price" id="price" class="form-control"
                                placeholder="Inputkan harga paket..." value="{{ $paket->price }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-12 mb-2 form-group">
                            <label for="description">Deskripsi Paket</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10" value="{{ $paket->description }}">{{ $paket->description }}</textarea>
                            
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('custom-js')
    @include('base.include.include-previewimage-paketedit')
@endsection
