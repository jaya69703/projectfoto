@extends('base.base-root-index')
@section('custom-css')

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

  <!-- ======= Projet Details Section ======= -->
  <section id="project-details" class="project-details">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="position-relative h-100" style="max-width: 560px; margin: 0 auto; text-align: center; display: flex; justify-content: center; align-items: center;">
            <div class="slides-1 portfolio-details-slider swiper" style="">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="{{ asset('storage/images/paket/'.$paket->image) }}" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="{{ asset('storage/images/paket/'.$paket->image) }}" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>


      <div class="row justify-content-between gy-4 mt-4">

        <div class="col-lg-8">
          <div class="portfolio-description">
            <h2>{{ $paket->name }}</h2>
            <p>{{ $paket->description }}</p>

            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <div>
                <img src="{{ asset('root') }}/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-3">
          <div class="portfolio-info">
            <h3>{{ $paket->price }}</h3>
            <ul>
              <li><strong>Category</strong> <span>Web design</span></li>
              <li><strong>Client</strong> <span>ASU Company</span></li>
              <li><strong>Project date</strong> <span>01 March, 2020</span></li>
              <li><strong>Project URL</strong> <a href="#">www.example.com</a></li>
              @auth
              <li><a href="#" class="btn-visit align-self-start" data-bs-toggle="modal" data-bs-target="#bookNow"><i class="fa-solid fa-bookmark" style="margin-right: 5px"></i>Booking Now</a></li>
              @if($ubook->count() > 0)
              <li><a href="#" class="btn-visit align-self-start" data-bs-toggle="modal" data-bs-target="#bookNow"><i class="fa-solid fa-star" style="margin-right: 5px"></i> Rate us</a></li>
              @endif
              @endauth
              @guest
              <li><a href="#" class="btn-visit align-self-start" data-bs-toggle="modal" data-bs-target="#loginNow">Login to Booking</a></li>
              @endguest
            </ul>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Projet Details Section -->

</main><!-- End #main -->

{{-- Modal Booking Now --}}
<div class="modal fade" id="bookNow" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('user.book.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Booking {{ $submenu }}</h5>
                    <div class="d-flex justify-content-between align-items-center">

                        <button style="margin-right: 10px;" type="submit" class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    @auth
                    <div class="form-group col-12 mb-3">
                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                        @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    @endauth
                    <div class="form-group col-12 mb-3">
                        <input type="hidden" name="paket_id" id="paket_id" class="form-control" value="{{ $paket->id }}">
                        @error('paket_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="book_date">Choose Date</label>
                        <input type="date" name="book_date" id="book_date" class="form-control" placeholder="Input your date...">
                        @error('book_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="book_time">Choose Time</label>
                        <select name="book_time" id="book_time" class="form-select">
                            <option value="">Choose Time</option>
                            <option value="07.00">07.00</option>
                            <option value="08.00">08.00</option>
                            <option value="09.00">09.00</option>
                            <option value="10.00">10.00</option>
                            <option value="11.00">11.00</option>
                            <option value="12.00">12.00</option>
                            <option value="13.00">13.00</option>
                            <option value="14.00">14.00</option>
                            <option value="15.00">15.00</option>
                            <option value="16.00">16.00</option>
                            <option value="17.00">17.00</option>
                            <option value="18.00">18.00</option>
                            <option value="19.00">19.00</option>
                            <option value="20.00">20.00</option>
                            <option value="21.00">21.00</option>
                        </select>
                        @error('book_time') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="book_note">Message</label>
                        <textarea name="book_note" id="book_note" cols="30" rows="10" class="form-control" placeholder="Input your message..."></textarea>
                        @error('book_note') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- Modal Login --}}
<div class="modal fade" id="loginNow" tabindex="-1" role="dialog" aria-labelledby="tabsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="font-size: 20px">
                    <h5 class="modal-title" id="tabsModalLabel">Booking {{ $submenu }}</h5>
                    <div class="d-flex justify-content-between align-items-center">

                        <button style="margin-right: 10px;" type="submit" class="btn btn-rounded btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                        <button style="" type="button" class="btn btn-rounded btn-outline-warning" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-12 mb-3">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Input your email...">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-12 mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Input your password...">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('custom-js')
@endsection
