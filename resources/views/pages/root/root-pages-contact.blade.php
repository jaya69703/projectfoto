@extends('base.base-root-index')
@section('custom-css')
@php
    $web = App\Models\WebSetting::find(1)->first();
@endphp
@endsection
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('{{ asset('root') }}/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center text-center" data-aos="fade">

        <h2>{{ $submenu }}</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>{{ $submenu }}</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-map"></i>
                <h3>Our Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p><a href="mailto:{{ $web->site_mail }}">{{ $web->site_mail }}</a></p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
              <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p><a href="tel:{{ $web->site_phone }}">{{ $web->site_phone }}</a></p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="row gy-4 mt-1">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-lg-6 ">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="col-lg-6">
              <form action="{{ route('root.pages.contact.store') }}" method="post" class="mail-form">
                @csrf
                <div class="row gy-4">
                  <div class="col-lg-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{ Auth::user()->name ?? '' }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-lg-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{ Auth::user()->email ?? '' }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="my-3">
                </div>
                <div class="text-center"><button type="submit" class="btn btn-outline-warning">Send Message</button></div>
              </form>
            </div><!-- End Contact Form -->

          </div>

        </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

@endsection
@section('custom-js')

@endsection
