@extends('base.base-root-index')
@section('custom-css')
<style>
    .form-control {
  border-radius: 20px; /* Sesuaikan dengan tingkat kebulatan yang Anda inginkan */
}
</style>
@endsection
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('root') }}/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>{{ $submenu }}</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>{{ $submenu }}</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>{{ $submenu }}</h2>
            <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p>
          </div>


          <div class="row">

              @if(Str::is('user/book/profile', request()->path()))
                <form action="{{ route('user.book.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success!</strong> {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(session('failed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Failed!</strong> {{ session('failed') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="col-lg-3 mb-3">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <span class="" style="font-size: 20px;">Photo User</span>
                                    <span class="">
                                        <button type="button" class="btn btn-outline-danger btn-rounded mr-2" id="reset-button"><i class="fa-solid fa-arrows-rotate"></i></button>
                                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/images/user/'.Auth::user()->image) }}" class="card-img-top img-fluid mb-3" style="width: 300px;" alt="Profile-Picture" id="image-preview">
                                    </div>
                                    <label for="image">Profile Picture</label>
                                    <input type="file" id="image" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 mb-3">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <span class="" style="font-size: 20px;">Profile User</span>
                                    <span class="">
                                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                                    </span>
                                </div>
                                <div class="row card-body">
                                    <div class="form-group col-lg-6 col-12 mb-2">
                                        <label for="name">Fullname</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Input your name...">
                                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mb-2">
                                        <label for="phone">Phone number</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ Auth::user()->phone }}" placeholder="Input your phone number...">
                                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mb-2">
                                        <label for="email">Email address</label>
                                        <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Input your email address...">
                                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12 mb-2">
                                        <label for="address">Home address</label>
                                        <textarea name="address" id="address" class="form-control" rows="1" placeholder="Input your home address...">{{ Auth::user()->address }}</textarea>
                                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
              @elseif(Str::is('user/book/changepass', request()->path()))
                <form action="{{ route('user.book.update.password') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success!</strong> {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> {{ session('failed') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <span class="" style="font-size: 20px;">Change Password</span>
                                <span class="">
                                    <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa-solid fa-floppy-disk"></i></button>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12 mb-2">
                                    <label for="current_password">Old Password</label>
                                    <input type="text" name="current_password" id="current_password" class="form-control" placeholder="Input your old password...">
                                    @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-12 mb-2">
                                    <label for="password">New Password</label>
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Input your new password...">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-12 mb-2">
                                    <label for="password_confirmation">Confirm New Password</label>
                                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Input your confirm new password...">
                                    @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
              @endif
          </div>


        </div>
      </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

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
